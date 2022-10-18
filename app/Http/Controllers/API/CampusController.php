<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Campus;
use App\Models\Follow;
use App\Models\Major;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CampusController extends Controller
{

    public function fetch(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $province = $request->input('province');
        $status = $request->input('status');
        $type = $request->input('type');
        $politechnic = $request->input('politechnic');
        $major = $request->input('major');
        $limit = $request->input('limit', 10);


        if ($id) {
            $campus = Campus::find($id);

            if ($campus) {
                return ResponseFormatter::success($campus, 'Campus found');
            }

            return ResponseFormatter::error('Campus not found', 404);
        }

        $campuses =  Campus::with(['users', 'address', 'type.category', 'status.category', 'majors']);


        if ($name) {
            return $this->filter('name-campus', 'name', null, $name, $campuses, $limit);
        }
        if ($province) {
            return $this->filter(null, 'province', 'address', $province, $campuses, $limit);
        }
        if ($status) {
            return $this->filter('name-status', 'name', 'status.category', $status, $campuses, $limit);
        }
        if ($type) {
            return $this->filter('name-type', 'name', 'type.category', $type, $campuses, $limit);
        }
        if ($politechnic) {
            return $this->filter('polytechnic', 'is_polytechnic', null, $politechnic, $campuses, $limit);
        }
        if ($major) {
            return $this->filter('name-major', 'name', 'majors', $major, $campuses, $limit);
        }

        return ResponseFormatter::success(
            $campuses->paginate($limit),
            'Campus Found'
        );
    }

    public function filter($field, $query, $relation, $key, $campuses, $limit = 10)
    {

        if ($field == 'name-campus') {
            $campuses->where('name', 'like', '%' . $key . '%');
        } else if ($field == 'polytechnic') {
            $campuses->where($query, $key);
        } else {
            $campuses->whereRelation($relation, $query, $key);
        }


        if ($campuses->paginate($limit)->items()) {

            return ResponseFormatter::success(
                $campuses->paginate($limit),
                'Campus Found'
            );
        }

        return ResponseFormatter::error('Campus not found', 404);
    }

    public function major(Request $request, $id)
    {
        $limit = $request->input('limit', 10);

        $campuses = Campus::with(['majors'])->whereHas('majors', function ($query) use ($id) {
            $query->where('campus_id', $id);
        });

        // return $campuses;
        try {
            if ($campuses->paginate($limit)->items()) {

                return ResponseFormatter::success(
                    $campuses->paginate($limit),
                    'Campus Found'
                );
            }
            return ResponseFormatter::error('Campus not found', 404);
        } catch (Exception $e) {
            return ResponseFormatter::error(
                $e->getMessage(),
                400
            );
        }
    }

    public function follow($id)
    {

        try {
            $user = User::find(Auth::id());
            $campus = Campus::find($id);
            if (!$campus) {
                return ResponseFormatter::error('Campus not found', 404);
            }

            $count =  count(Follow::with(['campus'])
                ->where('campus_id', $id)
                ->where('user_id', Auth::id())
                ->get());


            if ($count < 1) {
                $campus->users()->attach($user->id);
                return ResponseFormatter::success(
                    $campus,
                    'Success follow'
                );
            } else {
                $user->campuses()->detach($campus->id);
                return ResponseFormatter::success(
                    $campus,
                    'Success unfollow'
                );
            }
        } catch (Exception $e) {
            return ResponseFormatter::error(
                $e->getMessage(),
                400
            );
        }
    }
}

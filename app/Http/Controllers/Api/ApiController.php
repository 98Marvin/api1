<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use App\Models\Student;

class ApiController extends Controller
{
    // Create API (POST)
    public function createStudent(Request $request)
    {
        //validation
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:students',
                'phone_no' => 'required',
                'age' => 'required',
                'gender' => 'required',
            ],
            [
                'gender.required' => 'Chagua jinsia Mbwaaa..',
            ],
        );

        //create data
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone_no = $request->phone_no;
        $student->age = $request->age;
        $student->gender = $request->gender;

        $student->save();

        //send response
        return response()->json([
            'status' => 1,
            'message' => 'Student Created Successfully...!!',
        ]);
    }

    // List API (GET)
    public function listStudents()
    {
        $students = Student::get();

        return response()->json(
            [
                'status' => 1,
                'message' => 'All Students',
                'data' => $students,
            ],
            200,
        );
    }

    // List API (GET)
    public function showStudent($id)
    {
        if (Student::where('id', $id)->exists()) {
            $student = Student::where('id', $id)->first();

            return response()->json(
                [
                    'status' => 1,
                    'message' => 'Single Student Details',
                    'data' => $student,
                ],
                200,
            );
        } else {
            return response()->json(
                [
                    'status' => 0,
                    'message' => 'Student Not Found In Database',
                ],
                404,
            );
        }
    }

    // List API (PUT)
    public function updateStudent(Request $request, $id)
    {
        if (Student::where("id", $id)->exists()) {

            $employee = Student::find($id);

            $employee->name = !empty($request->name) ? $request->name : $employee->name;
            $employee->email = !empty($request->email) ? $request->email : $employee->email;
            $employee->phone_no = !empty($request->phone_no) ? $request->phone_no : $employee->phone_no;
            $employee->gender = !empty($request->gender) ? $request->gender : $employee->gender;
            $employee->age = !empty($request->age) ? $request->age : $employee->age;

            $employee->save();

            return response()->json([
                "status" => 1,
                "message" => "Student updated successfully"
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "message" => "Student not found"
            ], 404);
        }
    }

    // DELETE API - DELETE
    // URL: http://127.0.0.1:8000/api/students/3/delete
    public function deleteStudent($id)
    {
        if (Student::where("id", $id)->exists()) {

            $employee = Student::find($id);

            $employee->delete();

            return response()->json([
                "status" => 1,
                "message" => "Student deleted successfully"
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "message" => "Student not found"
            ], 404);
        }
    }
}

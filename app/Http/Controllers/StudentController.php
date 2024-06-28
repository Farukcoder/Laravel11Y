<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Student;
use App\Models\Contact;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = Student::with('post')
        //         ->active()
        //         ->get();
        // $data = Student::get(['name', 'age']);

        // $data = Student::find(2, ['id', 'name']);
        // $data = Student::find(2)->name;
        // $data = Student::find(2)->value('name');

        // $data = Student::with('post:title,description,student_id')
        //         ->active()
        //         ->get(['name', 'gender', 'id']);

        // $data = Student::with([
        //     "post" => function ($query) {
        //         $query->select("student_id", "title", "description");
        //     },
        //     'contact' => function ($query) {
        //         $query->select("student_id", "phone", "email");
        //     }
        // ])->get(["id", "name"]);


        return $data;
    }

    public function getPost() {

        //$posts = Student::doesntHave('post')->get();

        //$posts = Student::has('post', '>', 1)->with('post')->get();

        $posts = Student::select(['name'])->withCount('post')->get();

        return $posts;
    }

    public function getRole() {

        $students = Student::with('roles')->get();

        foreach ($students as $student) {
            echo "Name: ". $student->name . "<br>";
            echo "Age: ". $student->age . "<br>";
            echo "Gender: ". $student->gender . "<br>";
            foreach ($student->roles as $role) {
                echo $role->name . " / ";
            }
            echo "<hr>";
        }
    }

    public function getCompanyInfo()
    {
        $studentCompanyInfos = Student::with('company')->with('companyInfoWithPhone')->get();

        foreach ($studentCompanyInfos as $studentCompanyInfo) {
            echo 'Company Name: '. ($studentCompanyInfo->company->name ?? 'N/A') . "<br>";
            echo 'Owner Name: '. $studentCompanyInfo->name . "<br>";
            echo 'Owner Phone: '. ($studentCompanyInfo->companyInfoWithPhone->mobile ?? 'N/A') . "<br>";
            echo "<hr>";
        }



    }

    public function latestOrder()
    {
        $latestOrders = Student::with('orders')->with('latestOrder')->get();

        foreach ($latestOrders as $latestOrder) {
            echo $latestOrder->name . '<br>';
            echo $latestOrder->age . '<br>';
            echo $latestOrder->gender . '<br>';

            foreach ($latestOrder->orders as $order) {
                echo $order->amount . '<br>';
            }
            echo 'Latest order amount: ' . $latestOrder->latestOrder->amount . '<br>';
            echo "<hr>";
        }

        //return $latestOrders;
    }

    public function countryWisePost()
    {
        $studentWisePost = Student::with('studentWisePost')->with('countries')->get();

        return $studentWisePost;
    }

    public function studentWiseImage()
    {
        $studentImages = Student::with('image')->get();

        return $studentImages;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $student = Student::create([
        //     'country_id' => 1,
        //     'name' => 'John Doe',
        //     'age' => 25,
        //     'gender' => 'M',
        // ]);
        //
        // $student->image()->create([
        //     'url' => 'images/student/student-one.jpg'
        // ]);

        Student::findOrfail(1)->delete();

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

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
        $data = Student::where('age', 7)
            ->withWhereHas('contact', function ($q) {
                $q->where('city', 'Comilla, Bangladesh');
            })
            ->get();

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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

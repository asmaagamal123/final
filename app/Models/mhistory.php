<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalHistory;

class MedicalHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        // استرجاع جميع سجلات التاريخ الطبي
        return MedicalHistory::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(Request $request)
    {
        // التحقق من صحة البيانات المُرسلة
        $request->validate([
            'user_id' => 'required|integer',
            'condition' => 'required|string',
            'diagnosis_date' => 'required|date',
            // يمكن إضافة مزيد من قواعد التحقق حسب الاحتياجات
        ]);

        // إنشاء سجل تاريخ طبي جديد
        return MedicalHistory::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function show($id)
    {
        // العثور على سجل التاريخ الطبي باستخدام المعرف
        return MedicalHistory::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update(Request $request, $id)
    {
        // العثور على سجل التاريخ الطبي المطلوب تحديثه باستخدام المعرف
        $medicalHistory = MedicalHistory::findOrFail($id);

        // التحقق من صحة البيانات المُرسلة للتحديث
        $request->validate([
            'condition' => 'required|string',
            'diagnosis_date' => 'required|date',
            // يمكن إضافة مزيد من قواعد التحقق حسب الاحتياجات
        ]);

        // تحديث بيانات سجل التاريخ الطبي
        $medicalHistory->update($request->all());

        // إرجاع بيانات سجل التاريخ الطبي المحدثة
        return $medicalHistory;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return int
     */
    public function destroy($id)
    {
        // العثور على سجل التاريخ الطبي المطلوب حذفه باستخدام المعرف
        $medicalHistory = MedicalHistory::findOrFail($id);

        // حذف سجل التاريخ الطبي
        $medicalHistory->delete();

        // إرجاع استجابة بنجاح للحذف
        return 204;
    }
}


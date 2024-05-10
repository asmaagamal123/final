<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeartRate;

class HeartRateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        // استرجاع جميع بيانات معدل ضربات القلب
        return HeartRate::all();
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
            'rate' => 'required|integer',
            // يمكن إضافة مزيد من قواعد التحقق حسب الاحتياجات
        ]);

        // إنشاء بيانات معدل ضربات القلب الجديدة
        return HeartRate::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function show($id)
    {
        // العثور على بيانات معدل ضربات القلب باستخدام المعرف
        return HeartRate::findOrFail($id);
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
        // العثور على بيانات معدل ضربات القلب المطلوب تحديثها باستخدام المعرف
        $heartRate = HeartRate::findOrFail($id);

        // التحقق من صحة البيانات المُرسلة للتحديث
        $request->validate([
            'rate' => 'required|integer',
            // يمكن إضافة مزيد من قواعد التحقق حسب الاحتياجات
        ]);

        // تحديث بيانات معدل ضربات القلب
        $heartRate->update($request->all());

        // إرجاع بيانات معدل ضربات القلب المحدثة
        return $heartRate;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return int
     */
    public function destroy($id)
    {
        // العثور على بيانات معدل ضربات القلب المطلوب حذفها باستخدام المعرف
        $heartRate = HeartRate::findOrFail($id);

        // حذف بيانات معدل ضربات القلب
        $heartRate->delete();

        // إرجاع استجابة بنجاح للحذف
        return 204;
    }
}


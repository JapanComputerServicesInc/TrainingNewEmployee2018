<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Department;

class AddDepartmentIdToEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // departmentsテーブルにデフォルトの1のデータが無い場合は先に作成しておく
        $default_department_id = 1;
        if (!Department::find(1)) {
            $department = Department::create([
                'name' => '未設定'
            ]);
            $default_department_id = $department->id;
        }

        Schema::table('employees', function (Blueprint $table) use ($default_department_id) {
            $table->unsignedInteger('department_id')->default($default_department_id)->comment('所属部門ID')->after('name');
            $table->foreign('department_id', 'employees_department_id_foreign')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropForeign('employees_department_id_foreign');
            $table->dropColumn('department_id');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->enum('type', [1, 2]); // النوع 1 غرفة او  2 جناخ
            $table->string('name'); // الاسم
            $table->string('neighborhood'); // الحي
            // $table->string('apartment_number')->nullable(); // رقم الشقة
            $table->integer('price')->nullable(); // السعر

            // $table->enum('rental_type', [1, 2])->nullable(); // نوع الاجار ان وجد  // النوع 1 عادي او  2 مفروش
            // $table->enum('rental', ['daily', 'monthly', 'yearly'])->nullable(); // سعر الاجار ان وجد
            $table->string('features')->nullable(); // المميزات
            // $table->integer('space'); // المساحة
            // نوع المساحة
            // $table->foreignId('space_type_id')->constrained('space_types')->onDelete('cascade')->onUpdate('cascade');

            // $table->string('degree')->nullable(); // الدرجة
            $table->foreignId('state_id')->nullable()->constrained('states')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('city_id')->nullable()->constrained('cities')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade'); // الحقل يمكن أن يكون فارغاً
            $table->bigInteger('count')->default(0); // المشاهدات

            $table->string('user_name')->nullable(); //
            $table->string('user_phone_number')->nullable();
            $table->string('user_whatsapp_number')->nullable();
            $table->string('user_address')->nullable();
            $table->string('user_iden')->nullable(); // رقم الهوية

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
};

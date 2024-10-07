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
        Schema::create('parcels', function (Blueprint $table) {
            $table->id();
            // سكني - زراعي - تجاري
            $table->foreignId('parcel_type_id')->constrained('parcel_types')->onDelete('cascade')->onUpdate('cascade');


            // شعادة بحث - جيازة - مقنن
            $table->foreignId('parcel_category_id')->constrained('parcel_categories')->onDelete('cascade')->onUpdate('cascade');

            $table->string('square'); // المربع
            $table->string('neighborhood'); // الحي
            $table->string('parcels_number')->nullable(); // رقم القطعة
            $table->integer('price')->nullable(); // السعر
            $table->string('features')->nullable(); // المميزات
            $table->integer('space'); // المساحة
            // نوع المساحة
            $table->foreignId('space_type_id')->constrained('space_types')->onDelete('cascade')->onUpdate('cascade');

            $table->string('degree')->nullable(); // الدرجة

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
        Schema::dropIfExists('parcels');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{  
    
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->string('order_id')->unique();
            $table->string('user_id');
            $table->string('fullName');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('note');
            $table->string('totalMoney');
            $table->timestamps();
        });
    }

    public function generateInvoiceNumber()
    {
        $lastOrder_id = DB::table('orders')->max('order_id');
        $nextOrder_id = 'HD' . str_pad(intval(substr($lastOrder_id, 2)) + 1, 5, '0', STR_PAD_LEFT);

        return $nextOrder_id;
    }

    public function run()
    {
        $order_id = $this->generateInvoiceNumber();

        DB::table('orders')->insert([
            'order_id' => $order_id,
           
        ]);
    }
};
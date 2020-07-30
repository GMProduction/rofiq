<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Master extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->timestamps();
        });

        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->timestamps();
        });

        Schema::create('ongkir', function (Blueprint $table) {
            $table->id();
            $table->string('kota');
            $table->integer('harga');
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kategori_id')->unsigned();
            $table->string('nama');
            $table->enum('satuan', ['pcs', 'lusin'])->default('pcs');
            $table->integer('harga')->default(0);
            $table->integer('qty')->default(0);
            $table->integer('diskon')->default(0);
            $table->string('url');
            $table->string('deskripsi');
            $table->timestamps();
            $table->foreign('kategori_id')->references('id')->on('kategori');
        });

        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('no_transaksi');
            $table->integer('nominal');
            $table->integer('ongkir');
            $table->enum('status', ['0', '1', '2'])->default('0');
            $table->timestamps();
        });

        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('transactions_id')->unsigned()->nullable();
            $table->enum('tipe', ['order', 'pre'])->default('order');
            $table->integer('harga');
            $table->integer('qty');
            $table->text('detail');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('transactions_id')->references('id')->on('transactions');
            $table->foreign('product_id')->references('id')->on('products');
        });

        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('transactions_id')->unsigned();
            $table->bigInteger('vendors_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('url');
            $table->text('description');
            $table->enum('status', ['0', '1', '2'])->default('0');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('vendors_id')->references('id')->on('vendors');
            $table->foreign('transactions_id')->references('id')->on('transactions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrainded()->onDelete('cascade');

            // 1. Заголовок
            $table->string('title', 255); 

            // 2. Текст
            $table->text('body');         
            
            // 3. Дата создания и обновления
            // Laravel автоматически добавит поля created_at (дата создания) и updated_at
            $table->timestamps(); 
            
            // Опционально: счетчики для отображения
            $table->unsignedInteger('likes_count')->default(0); 
            $table->unsignedInteger('dislikes_count')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};


<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courriers', function (Blueprint $table) {
            $table->id('NDSICG');
            $table->string('dateDSICG');
            $table->string('NumBO');
            $table->string('DateBO');
            $table->text('typeExpiditeur');
            $table->text('expiditeurAD');
            $table->text('expiditeurPER');
            $table->text('Annex');
            $table->text('objet');
            $table->text('theme');
            $table->text('type');
            $table->text('observation');
            $table->text('travailEFF');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('courriers');
    }
};
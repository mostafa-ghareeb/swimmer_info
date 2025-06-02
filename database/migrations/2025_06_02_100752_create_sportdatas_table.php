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
            Schema::create('sportdatas', function (Blueprint $table) {
                $table->id();
                $table->boolean('member_of_other_clubs')->nullable();
                $table->string('other_clubs')->nullable();
                $table->boolean('did_you_play_for_other_club')->nullable();
                $table->string('have_you_obtained_the_star_tests_and_their_number')->nullable();
                $table->string('where_to_get_star_tests')->nullable();
                $table->decimal('union_registration_number')->nullable();
                $table->foreignId('swimmer_id')->constrained('swimmers')->onDelete('cascade');
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('sportdatas');
        }
    };


        <?php

        use Illuminate\Database\Migrations\Migration;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Support\Facades\Schema;

        class CreateTestPermissionsTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create('test_permissions', function (Blueprint $table) {
                        $table->id();
                    			$table->string('action');
			$table->foreignId('test_roles_id')->constrained();
			$table->foreignId('subjects_id')->constrained();

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
                Schema::dropIfExists('test_permissions');
            }
        }
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaybillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('paybills')->insert([
            [
                'name' => 'RHIDISHA JAMII LTD 2',
                'radio' => 'KAYO',
                'shortcode' => 847272,
                'initiator' => 'RIDHISHA API',
                'SecurityCredential' => 'DPMcEYFFnesJtAbqm8atB31z0T4iDsY6BbrhYIZEyDquNM...',
                'key' => 'C0yEOiRqI3qyBGYTKggGzmFj3ADM99r0',
                'secret' => 'IzMlTHsEcOEiiB3C',
                'passkey' => 'IzMlTHsEcOEiiB3C',
                'created_at' => '2023-12-05 22:01:21',
                'updated_at' => '2023-12-05 22:01:21',
            ],
            [
                'name' => 'RHIDISHA JAMII LIMITED',
                'radio' => 'Ridhishajamii',
                'shortcode' => 604777,
                'initiator' => 'RIDHISHA API',
                'SecurityCredential' => 'UzEvi7AyUOOpupWGWM3gpVO2rv3BfCA5YiBzHVOYaVAhcH...',
                'key' => 'y82cyoSVkEArn9zZOZpCP5eqIRIAeS9Y',
                'secret' => 'JQI53DG2Ruvivyd5',
                'passkey' => 'faad684ad7e09f6f52f5032d8508ba5dcaa516006fc804...',
                'created_at' => '2023-12-14 10:22:29',
                'updated_at' => '2023-12-14 10:22:29',
            ],
        ]);
    }
}

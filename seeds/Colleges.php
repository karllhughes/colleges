<?php

use Phinx\Seed\AbstractSeed;

class Colleges extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $this->table('colleges')->truncate();
        $file = fopen("seeds/files/colleges_2016_03.csv","r");
        $c = 0;
        $headers = [];
        $colleges = [];

        // Loop through each row
        while(!feof($file)) {

            $row = fgetcsv($file);

            if ($c == 0) {
                // First time through set the headers
                $headers = $row;
            } else {
                // Then add each value to row of data
                $data = [];
                $address = [];
                foreach ($row as $key => $value) {

                    // If the header has a '.', we assume its the address field
                    if (strpos($headers[$key], '.')) {
                        $columnNameArray = explode('.', $headers[$key]);
                        $address[$columnNameArray[1]] = $value;
                    } else {
                        if ($value) {
                            $data[$headers[$key]] = $value;
                        }
                    }
                }
                $data['address'] = json_encode($address);
                $colleges[] = $data;
            }

            $c++;
            echo $c.PHP_EOL;
        }

        fclose($file);

        // Insert each row into the db
        $this->insert('colleges', $colleges);
    }
}

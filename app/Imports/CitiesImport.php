<?php

namespace App\Imports;

use App\City;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class CitiesImport implements ToModel, WithValidation, WithHeadingRow 
{
    use Importable;
    protected $province_id;

    public function __construct($province_id) {
       $this->province_id = $province_id;
    }
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $data)
    {
         // print_r($data);
         // exit;
        // foreach($data as $row) {
            // dd($row);
        // dd($data['city_name']);
       $data1 = City::where('name','=',$data['city_name'])->exists();
       // dd($data1);
       if (!$data1) {
          return new City([
                 'province_id' => $this->province_id,
                'name' => $data['city_name'],
                 ]);
       } 
   // }
    }
    public function rules(): array
    {
        return [
        'city_name' => Rule::unique('cities', 'name'), // Table name, field in your db
    ];
    }
    public function customValidationMessages()
{
    return [
        'city_name.unique' => 'Duplicate Entry or entry already exist in database, Kindly check your Excel File and try again',
    ];
}
}

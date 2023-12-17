<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Jobs\CategoriesCsvProcess;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin/dashboard');
    }

    public function create()
    {
        return view('admin/category');
    }

    public function upload()
    {

        if (request()->has('mycsv')) {
            $data   =   file(request()->mycsv);
            // Chunking file
            $chunks = array_chunk($data, 1000);

            $header = [];
            $batch  = Bus::batch([])->dispatch();

            foreach ($chunks as $key => $chunk) {
                $data = array_map('str_getcsv', $chunk);

                if ($key === 0) {
                    $header = $data[0];
                    unset($data[0]);
                }

                $batch->add(new CategoriesCsvProcess($data, $header));
            }

            return $batch;
        }

        return 'please upload file';
    }

    public function batch()
    {
        $batchId = request('id');
        return Bus::findBatch($batchId);
    }

    public function store()
    {

      // CategoriesCsvProcess::dispatch();

        //return 'done';

    }

    
}

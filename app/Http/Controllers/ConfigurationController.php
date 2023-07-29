<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Configuration;

class ConfigurationController extends \App\Core\BaseController
{
    public function getConfig(Request $request)
    {
        $data = $request->post();
        $operation = Configuration::where('config_group', $data['group'])->orderBy('config_order', 'ASC')->get();
        // print_r($operation); exit;

        return $this->response([
            'config' => $operation,
        ]);
    }
    public function save(Request $request)
    {
        $data = $request->post();
        try {
            $dataSave = [];
            foreach ($data as $key => $value) {
                if (count(explode('_', $key)) == 1) {
                    array_push($dataSave, [
                        'config_id' => $key,
                        'config_value' => $value
                    ]);
                }
            }
            print_r($dataSave); exit;

            $operation = Configuration::updateBatch('config_id', $dataSave);

            return $this->respondUpdated([
                'success' => true,
                'message' => 'Successfully updated data.',
            ]);
        } catch (\Throwable $th) {
            return $this->respondUpdated([
                'success' => false,
                'message' => 'Failed to update data, There was an error on the server.'
            ]);
        }
        return $this->respondUpdated($operation);
    }
}

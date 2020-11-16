<?php

declare(strict_types=1);

namespace App\Http\Procedures;

use App\Models\Data;
use Illuminate\Http\Request;
use Sajya\Server\Procedure;

class DataProcedure extends Procedure
{
    /**
     * The name of the procedure that will be
     * displayed and taken into account in the search
     *
     * @var string
     */
    public static string $name = 'data';

    /**
     * @param Request $request
     * @return mixed
     */
    public function getByPageUid(Request $request)
    {
        $validatedData = $request->validate([
            'page_uid' => 'required|string|max:255',
        ]);

        return Data::where('page_uid', $validatedData['page_uid'])->first();
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function saveByPageUid(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'page_uid' => 'required|string|max:255',
        ]);

        $data = Data::firstWhere('page_uid', $request->input('page_uid')) ?: new Data();
        $data->last_name = $validatedData['last_name'];
        $data->first_name = $validatedData['first_name'];
        $data->page_uid = $validatedData['page_uid'];

        return $data->save();
    }
}

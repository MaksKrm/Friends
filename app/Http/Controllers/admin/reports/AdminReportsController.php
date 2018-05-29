<?php
namespace App\Http\Controllers\admin\reports;
use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Session;
use Excel;
use File;
class AdminReportsController extends Controller
{
    public function index()
    {
        return view('admin/reports/reports');
    }
    public function import(Request $request)
    {
        $this->validate($request, array(
            'file' => 'required'
        ));
        if ($request->hasFile('file')) {
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls") {
                $path = $request->file->getRealPath();
                $data = Excel::load($path, function ($reader) {
                })->get();
                if (!empty($data) && $data->count()) {
                    foreach ($data as $key => $value) {
                        if (!$value->expense == '') {
                            $insert[] = [
                                'accounting_period' => $value->accounting_period,
                                'income' => $value->income,
                                'income_val' => $value->income_val,
                                'expense' => $value->expense,
                                'expense_val' => $value->expense_val,
                            ];
                        } else break;
                    }
                    if (!empty($insert)) {
                        $insertData = DB::table('reports')->insert($insert);
                        if ($insertData) {
                            Session::flash('success', 'Данные успешно добавленны');
                        } else {
                            Session::flash('error', 'Ошибка добавления файла');
                            return back();
                        }
                    }
                }
                return back();
            } else {
                Session::flash('error', 'Файл ' . $extension . ' не является фалом excel');
                return back();
            }
        }
    }
}
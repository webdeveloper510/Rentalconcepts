<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Permission;
use App\Models\Details;
use DB;
use Session;

class DetailsController extends Controller

{
   public function index()
   {
      $location = Location::select('*')->get();
      return view('details', compact('location'));
   }
   public function selectedlocation(Request $request)
   {
      $request->validate([
         'file' => 'required|mimes:csv,txt,xlsx,xls',
         'location' => 'required',
         'date' => 'required'
      ]);
      $month = Details::select('*')->where('location', $request->location)
         ->where('date', $request->date)
         ->get()
         ->toArray();
      if (!$month) {
         $datas = new Details();
         if ($request->hasfile('file')) {
            $name = $request->location . '_' . date("his") . '.' . $request->file->extension();
            $folder = public_path('uploads/details/' . date("Y"));
            if (!file_exists($folder)) {
               mkdir($folder, 0777, true);
            }
            if ($request->file->move($folder, $name)) {
               $files[] = $name;
            }
         }
         $datas->filename = $name;
         $datas->file_location = $folder . '/' . $name;
         $datas->date = $request->date;
         $datas->location = $request->location;
         $save = $datas->save();
         if ($save) {
            return redirect('admin/details')->with('message', 'File has been added successfully.');
         } else {
            return redirect('admin/details')->with('message', 'File has not been  added.');
         }
      } else {
         if ($request->hasfile('file')) {
            $cname = $request->location . '_' . date("his") . '.' . $request->file->extension();
            $folder = public_path('uploads/details/' . date("Y"));
            if (!file_exists($folder)) {
               mkdir($folder, 0777, true);
            }
            if ($request->file->move($folder, $cname)) {
               $files[] = $cname;
            }
         }
         $fname = $folder . '/' . $cname;
         $upd = Details::where('location', $request->location)
            ->where('date', $request->date)
            ->update(['filename' => $cname, 'file_location' => $fname]);
         if ($upd) {
            return redirect('admin/details')->with('message', 'File has been added successfully.');
         } else {
            return redirect('admin/details')->with('message', 'File has not been  added.');
         }
      }
      // $datas = [];
      // if (($open = fopen(public_path() . '/uploads' . '/' . $name, "r")) !== FALSE) {
      //    $k = 0;
      //    while ($data = fgetcsv($open, 9000, ",")) {
      //       $k++;
      //       if ($k == 1) {
      //          continue;
      //       }
      //       $datas[] = $data;
      //    }
      //    fclose($open);
      // }
      // foreach ($datas as $k => $data) {

      //    $dataa = array(
      //       "location" =>  $loc,
      //       "blank_1" => $data[0],
      //       "blank_2" => $data[1],
      //       "blank_3" => $data[2],
      //       "blank_4" => $data[3],
      //       "blank_5" => $data[4],
      //       "blank_6" => $data[5],
      //       "blank_7" => $data[6],
      //       "blank_8" => $data[7],
      //       "blank_9" => $data[8],
      //       "type" => $data[9], 
      //       "dates" => $data[10],
      //       "num" => $data[11],
      //       "name" => $data[12],
      //       "memo" => $data[13],
      //       "class" => $data[14],
      //       "clr" => $data[15],
      //       "split" => $data[16],
      //       "debit" => $data[17],
      //       "credit" => $data[18],
      //       "balance" => $data[19]
      //    );
      //    $rev = DB::table('details_data')->select('*')
      //       ->where('location', $loc)
      //       ->get()->toArray();
      //    if (!$rev) {
      //       $save =  DB::table('details_data')->insert($dataa);
      //       if ($save) {
      //          return redirect('admin/details')->with('message', 'File has been added successfully.');
      //       } else {
      //          return redirect('admin/details')->with('message', 'File has not been added.');
      //       }
      //    } else {
      //       $upd = DB::table('details_data')->where('Location', $loc)->update($dataa);
      //       if ($upd) {
      //          return redirect('admin/details')->with('message', 'File has been added successfully.');
      //       } else {
      //          return redirect('admin/details')->with('message', 'File has not been added.');
      //       }
      //    }
      // }
   }
   public function details()
   {
      $dataa = Details::select('*')->get()->toArray();
      $cal = array("status" => '1');
      $prevdate = date("m-Y", strtotime("first day of previous month"));
      $defloc = DB::table('default_loc')->select('location')
         ->where('userid', Session::get('userloginid'))->get()->toArray();
      $locpermitted = Permission::select('locationid')->where('userid', Session::get('userloginid'))->where('allowed', 1)->orderBy('locationid', 'ASC')->limit(1)->get()->toArray();
      if (!$defloc) {
        
         $loc  = $locpermitted[0]['locationid'];

      } else {
         $loc = $defloc[0]->location;
      }
      $location = DB::table('locations')
         ->join('permissions', 'permissions.locationid', '=', 'locations.locationid')
         ->where('permissions.allowed', 1)
         ->where("permissions.userid", Session::get('userloginid'))
         ->get()->toArray();
      $data = Details::select('*')->where('location', $loc)->where('date', $prevdate)->get()->toArray();
      if ($dataa) {
         $path = $dataa[0]['file_location'];
         return view('details-data', compact('data', 'location', 'cal', 'prevdate', 'loc'));
      } else {
         return view('details-data', compact('data','location', 'cal', 'prevdate', 'loc'));
      }
   }
   public function download_file($file)
   {
      return response()->download($file);
   }
   public function getdetails(Request $request)
   {
      $data = Details::select('*')->where('location', $request->location)->where('date', $request->date)->get();
      $loc = $request->location;
      $date = $request->date;
      $location = DB::table('locations')
         ->join('permissions', 'permissions.locationid', '=', 'locations.locationid')
         ->where('permissions.allowed', 1)
         ->where("permissions.userid", Session::get('userloginid'))
         ->get()->toArray();
      return view('details-data', compact('data', 'location', 'loc', 'date'));
   }
   public function viewadmindetail()
   {
      $details = Details::select('*')->get();
      return view('admindetails', compact('details'));
   }
   public function deleteadmindetails($id)
   {
      $user = Details::find($id);
      $user->delete();
      return redirect('/admin/admindetail')->with('success', 'User has been deleted successfully.');
   }
   public function defaultloc(Request $request)
   {
      $result = DB::table('default_loc')->select('*')->where('userid', $request->usr_id)->get()->toArray();
      // print_r($result);
      if (!$result) {
        $n= DB::table('default_loc')->insert(['userid' => $request->usr_id, 'location' => $request->locid]);
         print_r($n);
      } else {
        $u=  DB::table('default_loc')->where('userid', $request->usr_id)->update(['location' => $request->locid]);
        print_r($u);
      }
   }
}

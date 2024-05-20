<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SiteUsers;
use App\Models\Location;
use App\Models\Permission;
use Session;
use DB;
use App\Models\Timecard;
use DateTime;
use App\Models\Directory;

class AdminController extends Controller

{

    public function createuser()
    {
        if (Session::has('loginid')) {
            return view('createuser');
        } else {
            return redirect('/admin');
        }
    }

    public function viewusers()
    {
        if (Session::has('loginid')) {
            return view('usertable');
        } else {
            return redirect('/admin');
        }
    }

    public function addlocation()
    {
        $manager = Siteusers::where('role', '=', 'Manager')->get()->toArray();
        $director = Siteusers::where('role', '=', 'Director')->get()->toArray();
        if (Session::has('loginid')) {
            return view('location', compact('manager', 'director'));
        } else {
            return redirect('/admin');
        }
    }

    public function showuser()
    {
        return view('createuser');
    }

    public function saveuserdata(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'role' => 'required',
            'password' =>'required'
        ]);
        $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
        
        $user = new  SiteUsers;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->password = md5($request->password);
        // $user->password = md5($password);
        $user->save();

        $to = $user->email;
        $message = "
            <html>
                <body>
                   <strong>RentalConcepts</strong>
                   <p>
                   Dear'" . $request->firstname . "' You are sucessfully registered with RentalConcepts.net
                   You may login with the following details.
                   </p>
                   <p>User's email is " . $request->email . "</p>
                   <p>User's temporary password is " . $request->password . "</p>
                </body>
            </html>
        ";
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
        $headers .= 'From: <rentalconcepts.net>' . "\r\n";
        mail($to, "User Credentials", $message, $headers);
        return redirect('admin/newuser')->with('message', 'User has been created successfully.');
    }

    public function siteuser(Request $request)
    {
        $data = SiteUsers::all();
        if (Session::has('loginid')) {
            return view('usertable', ['siteusers' => $data]);
        } else {
            return redirect('/admin');
        }
    }

    public function edituser($id)
    {
        $user = SiteUsers::find(base64_decode($id));
        return view('edit', compact('user'));
    }

    public function updateuserdata(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'role'  => 'required'
        ]);

        $user = SiteUsers::find($id);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->save();

        if (Session::has('loginid')) {
            return redirect('admin/viewusers')->with('success', 'User has been updated successfully.');
        } else {
            return redirect('/admin');
        }
    }



    public function deleteuserdata($id)
    {

        $user = SiteUsers::find($id);
        $userpermission = Permission::where('userid', $id)->delete();
        $user->delete();
        return redirect('admin/viewusers')
            ->with('info', 'User has been deleted successfully.');
    }



    public function  addlocationdata(Request $request)
    {
        $request->validate([
            'locationid' => 'required',
            'date' => 'required',
            'location' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'phone' => 'required',
        ]);
        $location = new Location;
        $location->locationid = $request->locationid;
        $location->location = $request->location;
        $location->address = $request->address;
        $location->city = $request->city;
        $location->state = $request->state;
        $location->zip = $request->zip;
        $location->phone = $request->phone;
        $location->save();
        if (Session::has('loginid')) {
            return redirect('admin/addlocation')->with('message', 'Location has been created successfully.');
        } else {
            return redirect('/admin');
        }
    }

    public function showlocation()
    {
        $data = Location::all();
        if (Session::has('loginid')) {
            return view('viewlocation', ['locdata' => $data]);
        } else {
            return redirect('/admin');
        }
    }

    public function showdata()
    {
        if (Session::has('loginid')) {

            $datas = DB::table('locations')->select(DB::raw('locations.*,Revenue.id,Revenue.Date,Revenue.SalesTaxColl,Revenue.RentalIncome,Revenue.CashSales,Revenue.CashSalesNoninventory,Revenue.EarlyPurchaseOption,Revenue.RollPro,Revenue.CollectionFeeInHouse,Revenue.ReinstatementFees,Revenue.OtherFeesAlignments,Revenue.OneTimeFees,Customer.Customers'))
                ->join('Revenue', 'locations.locationid', '=', 'Revenue.Location')
                ->join('Customer', 'Customer.data_id', '=', 'Revenue.id')
                ->get()->toArray();
            
            $location = Location::all();

            return view('viewdata', ['datas' => $datas], ['loc' => $location]);
        } else {
            return redirect('/admin');
        }
    }

    public function getcustomer(Request $request)
    {
        $id =  $request->location_id;
        $datas = DB::table('locations')->select(DB::raw('locations.*,Revenue.id,Revenue.Date,Revenue.SalesTaxColl,Revenue.RentalIncome,Revenue.CashSales,Revenue.CashSalesNoninventory,Revenue.EarlyPurchaseOption,Revenue.RollPro,Revenue.CollectionFeeInHouse,Revenue.ReinstatementFees,Revenue.OtherFeesAlignments,Revenue.OneTimeFees,Customer.Customers'))
            ->join('Revenue', 'locations.locationid', '=', 'Revenue.Location')
            ->join('Customer', 'Customer.data_id', '=', 'Revenue.id')
            ->Where('Revenue.id', '=', $id)
            ->get()->toArray();
        return json_encode($datas);
    }

    public function mainpage()
    {
        return view('master');
    }

    public function editlocation($id)
    {
        $location = Location::find(base64_decode($id));
        return view('editlocation', compact('location'));
    }

    public function updatelocationdata(Request $request, $id)
    {
        $request->validate([
            'location' => 'required',
            'address' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'state' => 'required',
            'phone' => 'required',
        ]);
        $location = Location::find($id);
        $location->location = $request->location;
        $location->address = $request->address;
        $location->city = $request->city;
        $location->state = $request->state;
        $location->zip = $request->zip;
        $location->phone = $request->phone;
        $location->save();
        return redirect('/admin/viewlocations')->with('success', 'Location has been updated successfully.');
    }

    public function deletelocationdata($id)
    {
        $location = Location::find($id);
        $location->delete();
        return redirect('/admin/viewlocations')->with('info', 'Location has been deleted successfully.');
    }

    public function createpassword($email, Request $request)
    {
        return view('createpassword', compact("email"));
    }

    public function admincreatepassword($email, Request $request)
    {
        return view('admincreatepassword', compact("email"));
    }

    public function forgetpassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
        $old = ini_set('memory_limit', '8192M');
        // $user = new  Loginuser;
        $email = $request->input('email');
        $user1 = DB::table('siteusers')
            ->where('email', $email)->first();
        if ($user1) {
            $encoded_email = base64_encode($email);
            if ($email) {
                $link = "http://rentalconcepts.net/createpassword/" . $encoded_email;
                $body = "
                                <html>
                                    <body>
                                        <p>Click here to change password:</p>
                                        <a href='" . $link . "'>Click here</a><br><br> 
                                        <p>Thank you</p>
                                    </body>
                                </html>
                            ";
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: <rentalconcepts.net>' . "\r\n";
                $to =  $email;
                // print_r($to);
                $subject = "Change Password";
                $message = 'Rental concepts site';
                $sent = mail($to, $subject, $body, $headers);
                return redirect('/forgetemail')->with('message', 'Please check your email to change the password.');
            } else {
                echo "Mail not sent";
            }
        } else {
            return redirect('/forgetemail')->with('info', 'Email does not exist');
        }
    }
    public function adminforgetpassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
        $old = ini_set('memory_limit', '8192M');

        // $user = new  Loginuser;
        $email = $request->input('email');
        $user1 = DB::table('siteusers')
            ->where('email', $email)->first();

        if ($user1) {
            $encoded_email = base64_encode($email);
            if ($email) {
                $link = "http://rentalconcepts.net/admin/createpassword/" . $encoded_email;
                $body = "
                                <html>
                                    <body>
                                        <p>Click here to change password:</p>
                                        <a href='" . $link . "'>Click here</a><br><br> 
                                        <p>Thank you</p>
                                    </body>
                                </html>
                            ";
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: <rentalconcepts.net>' . "\r\n";
                $to =  $email;
                print_r($to);
                $subject = "Change Password";
                $message = 'Rental concepts site';
                $sent = mail($to, $subject, $body, $headers);
                return redirect('admin/forgetemail')->with('message', 'Please check your email to change the password.');
            } else {
                echo "Mail not sent";
            }
        } else {
            return redirect('/forgetemail')->with('info', 'Email does not exist');
        }
    }

    public function  forgetemail()
    {
        return view('forgetemail');
    }

    public function  adminforgetemail()
    {
        return view('adminforgetpassword');
    }

    public function  forget()
    {
        return redirect('/forgetemail')->with('message', 'Please check your email to change the password.');
    }

    public function changepassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);
        // $user =  Loginuser::all();

        $email = $request->input('email');
        if ($email) {
            $password = md5($request->input('password'));
            // print_r($password);die;
            $sql = DB::table("siteusers")
                ->where("email",  $email)
                ->update(
                    array(
                        "password" => $password
                    )
                );
            // print_r($sql);die;
            return redirect('/createpassword/{email}')->with('message', 'Password updated successfully');
        } else {
            return redirect('/createpassword/{email}')->with('info', 'Password not updated');
        }
    }

    public function adminchangepassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);
        $email = $request->input('email');
        if ($email) {
            $password = md5($request->input('password'));
            // print_r($password);die;
            $sql = DB::table("siteusers")
                ->where("email",  $email)
                ->update(
                    array(
                        "password" => $password
                    )
                );
            // print_r($sql);die;
            return redirect('admin/createpassword/{email}')->with('message', 'Password updated successfully');
        } else {
            return redirect('admin/createpassword/{email}')->with('info', 'Password not updated');
        }
    }

    public function permissions(Request $request)
    {
        $location = Location::all();
        $userdata = SiteUsers::where('role', '!=', 'Super admin')->get();
        if (Session::has('loginid')) {
            return view('permissions', compact('userdata', 'location'));
        } else {
            return redirect('/admin');
        }
    }

    public function permissions_save(Request $request)
    {
        // print_r($request->all());
        $d = DB::table('permissions')->select('*')->where(['userid' => $request['User_id'],'locationid'=> $request['location_id']])->get()->toArray();
        if(!$d){
            $locationid = $request['location_id'];
            $userid = $request['User_id'];
            $allowed = $request['allowed'];
            $a = DB::table('permissions')->insert(
                array(
                    'locationid' => $locationid,
                    'userid' => $userid,
                    'allowed' => $allowed
                )
            );
        }
        else{
            $update_allowed = DB::table('permissions')
            ->where('locationid', $request['location_id'])->where('userid', $request['User_id'])
            ->update(['allowed' => $request['allowed']]);
        }    
    }

    // public function update_permissions(Request $request)
    // {
    //     // print_r($request->all());die;
    //     $locationid = $request['location_id'];
    //     $userid = $request['User_id'];
    //     $allowed = $request['allowed'];
    //     $update_allowed = DB::table('permissions')
    //         ->where('locationid', $locationid)->where('userid', $userid)
    //         ->update(['allowed' => 0]);
    // }

    public function checked_permissions(Request $request)
    {
        
        //  print_r($request->all());
        $users = Permission::join('locations', 'locations.locationid', '=', 'permissions.locationid')
            ->where('permissions.userid', $request->User_id)
            ->where('permissions.allowed', 1)
            ->get(['locations.location', 'locations.locationid']);
        return json_encode($users);
    }
    public function timecardfile()
    {
        return view('timecard');
    }
    public function timecard(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:txt',
        ]);
        $datas = new Timecard();
        if ($request->hasfile('file')) {
            $datas->filename = $request->file;
            $name = time() . rand(1, 100) . '.' . $datas->filename->extension();
            if ($datas->filename->move(public_path('uploads'), $name)) {
                $files[] = $name;
            }
        }
        $datas->save();
        $datas = [];
        // echo "<pre>";


        $current_employee_number = -1;
        $current_employee_first_name = "";
        $current_employee_last_name = "";
        $current_employee_location = "";
        $current_employee_department = "";
        $current_employee_dates = [];
        $ins_outs = false;
        $ins = [];
        $daily_totals = array(0, 0, 0, 0, 0, 0, 0);

        if (($open = fopen(public_path() . '/uploads' . '/' . $name, "r")) !== FALSE) {
            while (!feof($open)) {
                $filecontent = fgets($open) ;
                $csv_output = "";
                // Display each line

                $dates_array = [];
                $dates = preg_split("/[\s]+/", $filecontent);
                foreach ($dates as $date) {
                    if (preg_match("/\d(\d?)\/\d\d\/\d\d/", $date))
                        $dates_array[] = $date;
                }
                if (strstr($filecontent, "TIME CARD REPORT                                            PAGE:")) {
                    // $pagecount++;
                    $current_employee_number = -1;
                    $current_employee_first_name = "";
                    $current_employee_last_name = "";
                    $current_employee_location = "";
                    $current_employee_department = "";
                    $current_employee_dates = [];
                    
                } else if (strstr($filecontent, "TIME CARD FOR EMPLOYEE #:   ")) {
                    $current_employee_number = substr($filecontent, 28, 5);
                    $current_employee_first_name = substr($filecontent, 34, 15);
                    $current_employee_first_name = trim($current_employee_first_name);
                    $current_employee_last_name = substr($filecontent, 49, 19);
                    $current_employee_last_name = trim($current_employee_last_name);
                } else if (strstr($filecontent, "LOCATION:")) {
                    $current_employee_location = substr($filecontent, 10, 30);
                    $current_employee_location = trim($current_employee_location);
                    $pos_dept = stristr($filecontent, "DEPT: ");
                    $current_employee_department = substr($pos_dept, 6);
                    $current_employee_department  = trim($current_employee_department);
                    //next line is the dates
                } else if (count($dates_array) == 7) {
                    $current_employee_dates = $dates_array;
                    $ins_outs = false;
                    $ins = [];
                    $daily_totals = array(0, 0, 0, 0, 0, 0, 0);
                } else if (strstr($filecontent, "IN ") || strstr($filecontent, "OUT ")) {
                    $ins_outs = true;
                    //clear the date times array
                    $date_times = [];
                    $date_times[0] = substr($filecontent, 0, 12);
                    if (strlen($filecontent) > 17)
                        $date_times[1] = substr($filecontent, 18, 12);
                    if (strlen($filecontent) > 35)
                        $date_times[2] = substr($filecontent, 36, 12);
                    if (strlen($filecontent) > 53)
                        $date_times[3] = substr($filecontent, 54, 12);
                    if (strlen($filecontent) > 71)
                        $date_times[4] = substr($filecontent, 72, 12);
                    if (strlen($filecontent) > 89)
                        $date_times[5] = substr($filecontent, 90, 12);
                    if (strlen($filecontent) > 107)
                        $date_times[6] = substr($filecontent, 108, 12);

                    for ($i = 0; $i < count($date_times); $i++) {

                        if ($date_times[$i] && !preg_match("/^([\s]*)$/", $date_times[$i])) {
                            $time_in_24  = date("H:i", strtotime(substr($date_times[$i], 3)));
                            if (strstr($filecontent, "IN ")) {
                                $ins[$i] = $time_in_24;
                            } else {
                                if (strstr($filecontent, "OUT ")) {
                                    // $ins[$i] = $time_in_24;
                                    $a = new DateTime($ins[$i]);
                                    $b = new DateTime($time_in_24);
                                    $interval = $a->diff($b);
                                    //  echo "INTERNVAL".$interval->format("%H:%I");
                                    //  echo " <br>";

                                    //  echo "<pre>";
                                    //  print_r($interval);
                                    
                                    $current_total = $interval;
                                    // print_r($current_total);
                                    if ($daily_totals[$i] != 0) {
                                        $e = new DateTime('00:00');
                                        $f = clone $e;
                                        $e->add($current_total);
                                        // echo " <pre>";
                                        // print_r($current_total);
                                      
                                        
                                        $e->add($daily_totals[$i]);
                                        
                                        //    echo " adding INTERNVAL".$daily_totals[$i]->format("%H:%I");
                                        $daily_totals[$i] = $f->diff($e);

                                        // $e->add($daily_totals[$i]);
                                        // echo "<pre>";
                                        // print_r($daily_totals[$i]);
                                        //    echo " total: ". $daily_totals[$i]->format("%H:%I")."<br>";
                                    } else {
                                        $daily_totals[$i] = $current_total;
                                        $ins[$i] = "";
                                    }
                                }
                            }
                            if ($_POST["action"] == "Individual lines") {
                                $csv_output .= $current_employee_location . "\t" . $current_employee_number . "\t" . $current_employee_first_name . "\t" . $current_employee_last_name . "\t" . $current_employee_department 
                                    . $current_employee_dates[$i] . "\t" . substr($date_times[$i], 0, 3) . "\t" . $time_in_24 . "\n";
                            }
                        }
                    }
                    
                } else if($ins_outs == true) {
                    $ins_outs = false;
                    //we are done with ins and outs, send them to csv file
                    if ($_POST["action"] == "Daily Totals") {
                        for ($i = 0; $i < 7; $i++) {
                            if ($daily_totals != 0) {
                                if(is_int($daily_totals[$i]))
                            {
                                continue; 
                            }
                            //  echo $daily_totals[$i]->format("%H:%I");
                                  $timeArr = explode(':', $daily_totals[$i]->format("%H:%I"));
                                  $time_in_decimal = $timeArr[0] + $timeArr[1] / 60;
                              
                                $csv_output .= $current_employee_location . "\t" . $current_employee_number . "\t" . $current_employee_first_name . "\t" . $current_employee_last_name . "\t" . $current_employee_department .
                                    "\t" . $current_employee_dates[$i] . "\t" . $daily_totals[$i]->format("%H:%I") . "\t" . $time_in_decimal . "\n";
                            }
                        }

                    }               
                }
                header("Content-type: application/vnd.ms-excel");
                header("Content-Disposition: attachment; filename=\"TimeCards.xls\"");
                error_reporting(0);
            //     // echo"<pre>";
               print_r($csv_output);
            }
        }
    }
    public function directory(){
        return view('directory');
    }
    public function savedirectory(Request $request){
        $request->validate([
            'email' => 'required|email',
           'locationid'=>'required',
        ]);
        $adddata= new Directory();
        $adddata->locationid = $request->locationid;
        $adddata->manager = $request->manager;
        $adddata->email = $request->email;
        $adddata->phone = $request->phone;
        $adddata->fax = $request->fax;
        $adddata->location = $request->location;
        $adddata->regional = $request->regional;
        $adddata->director = $request->director;
        $adddata->mobile = $request->mobilenumber;
        $save= $adddata->save();
       if($save){
        return redirect('/admin/directory')->with('success','Data has been added successfully');
       }
    }
    public function viewdirectory(){
        $datas=Directory::all();
        return view('viewdirectory',compact('datas'));
    }
    public function editdirectory($id)
    {
        $editdata = Directory::find(base64_decode($id));
        return view('editdirectory', compact('editdata'));
    }
    public function updatedirectorydata(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email',
            'locationid'=>'required',
        ]);
        $updata = Directory::find($id);
       
        $updata->locationid = $request->locationid;
        $updata->manager = $request->manager;
        $updata->email = $request->email;
        $updata->phone = $request->phone;
        $updata->fax = $request->fax;
        $updata->location = $request->location;
        $updata->regional = $request->regional;
        $updata->director = $request->director;
        $updata->mobile = $request->mobilenumber;
        $updata->save();
        return redirect('/admin/viewdirectory')->with('success', 'Data has been updated successfully.');
    }
    public function deletedirectorydata($id){
        $deldata = Directory::find(base64_decode($id));
        $deldata->delete();
        return redirect('/admin/viewdirectory')->with('success', 'Location has been deleted successfully.');
    }
    public function showgrphs(Request $request){
        $sh=$request['showgraph'];
        DB::table('Showgraph')->where('status','1')->update(['status' => '0']);
        foreach($sh as $s){
            DB::table('Showgraph')->where('names',$s)->update(['status' => '1']);
        }
        return redirect('admin/dashboard');
    }
}
<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CommandController extends Controller
{
		function __construct()
		{
			/*
				Check Authen
			*/
			$this->middleware('auth');
		}
		
		/* localhost/ntms/public/commandview -> commandview, CommandController@view */
		public function view()
		{
			/* Check Validate */
			
			/* Select command table */
			$results = DB::table('command')->select('name')->get();	

			/* $command = array('1','ping','[DES]','[CMD] [DES]') */
			
			/* Reture View complete or return Status complete */
			return view('command' , ['strs' => $results]);
		}
		
		public function home()
		{	
			// id,name,param,format
			$drop=DB::table('command')
				->get();
				//->select('*')
				
			//ปุ่มชื่อset	
			$buttons=DB::table('command_set')
				->select('command_set.id','command_set.name as set_name','command_set.description')
				->get();
				
			//กดแล้วเนื้อหาข้างในเปลี่ยน
			$contents=DB::table('command_in_set')
				->join('command_set','command_in_set.cmd_set_id','=','command_set.id')
				->join('command','command_in_set.cmd_id','=','command.id')
				->select('command_in_set.order as order','command.name as name','command_in_set.cmd_set_id as cmdSetId','command_in_set.cmd_id as cmdId')
				->get();
			
			$command_childs=DB::table('command_child')->select('cmd_id','chi_id')->get();
			
			$command_child_group=DB::table('command_child')->groupBy('cmd_id')->select('cmd_id')->get();
			
			/* Reture View complete or return Status complete */
			return  view('homepage', ['num2'=>$drop,'buttons'=>$buttons ,'contents'=>$contents, 'command_childs'=>$command_childs ,'command_child_group'=>$command_child_group]);
		}
		
		public function create()
		{
				$list=DB::table('command')
				->select('command.id','command.name')
				->get();
				
			return view('CreateCmdSet', ['list2'=>$list] );
		}
		
		public function btCreate(Request $request)
		{
			$NameCMDSet = $request->input('NameCmdSet');
			$DesCMDSet = $request->input('DesCmdSet');
			
			$cmd_set_id = DB::table('command_set')->insertGetId(
				['name' => $NameCMDSet, 'description' => $DesCMDSet]
			);
			
			$selectCount = $request->input('selectCount');
			
			for ($i = 1; $i <= $selectCount; $i++)
			{
				DB::table('command_in_set')->insert(
					['order' => $i, 'cmd_set_id' => $cmd_set_id, 'cmd_id' => $request->input('selectC'.$i)]
				);
			}
			
			return redirect()
				->action('CommandController@home');
		}
		
		public function edit1($id) /*ปุ่มeditกล่องซ้าย แก้ไข command set*/
		{
			$CmdSetTable=DB::table('command_set')
			->where('command_set.id','=',$id)
			->get();
			
			$SelectFrom=DB::table('command')
			->whereNotIn('id',function ($query) use ($id) {
				$query->select('command_in_set.cmd_id')
					  ->from('command_in_set')
					  ->where('command_in_set.cmd_set_id','=',$id);
			})
			->get();
			
			$SelectTo=DB::table('command_in_set')
			->where('command_in_set.cmd_set_id','=',$id)
			->join('command','command_in_set.cmd_id','=','command.id')
			->get();
			
			return view('editCmdSet', ['IdCMDSet'=>$id ,'CmdSetTable'=>$CmdSetTable , 'SelectFrom'=>$SelectFrom, 'SelectTo'=>$SelectTo] );
		}
		
		//ส่งกลับ edit
		public function btEdit(Request $request)
		{
			$IdCMDSet = $request->input('IdCMDSet');
			$NameCMDSet = $request->input('NameCmdSet');
			$DesCMDSet = $request->input('DesCmdSet');
			
			DB::table('command_set')
				->where('id',$IdCMDSet)
				->update( 
				['name' => $NameCMDSet, 'description' => $DesCMDSet]
			);
			
			$cmdDelete = DB::table('command_in_set')->where('command_in_set.cmd_set_id', '=' ,$IdCMDSet)
					->delete(); 
			
			$selectCount = $request->input('selectCount');
			
			for ($i = 1; $i <= $selectCount; $i++)
			{
				DB::table('command_in_set')->insert(
					['order' => $i, 'cmd_set_id' => $IdCMDSet, 'cmd_id' => $request->input('selectC'.$i)]
				);
			}
			
			return redirect()
				->action('CommandController@home');
		}
		
		//หน้า change password
		public function PassChange()
		{  
			return view('changePass');
		}

		public function btChange(Request $request)
		{  
			$id = Auth::id();
			$email = $request->input('email');
			$password = $request->input('password');
			$password_confirmation = $request->input('password_confirmation');
			if ($password === $password_confirmation)
			{	
				$user = User::findOrFail($id);
				$user->fill([
					'password' => Hash::make($password)
				])->save();
			}
			return redirect()
				->action('CommandController@home');
		}
		
		
		/*หน้าlogin ใหม่*/
		public function index()
		{
			return redirect()
				->action('CommandController@home');
		}
		
		/*หน้าforgot ใหม่*/
		public function newforgot()
		{
			return view('newforgot');
		}
		
		public function login()
		{
			return view('auth/login');
		}
		
		public function forgot()
		{
			return view('forgot');
		}
		
		public function checkbox()
		{  
			return view('checkbox');
		}
		
		public function delete($id)
		{
			$deletes=DB::table('command_in_set')
				->where('command_in_set.cmd_set_id', '=' ,$id)
				->delete(); 
				
			$deletes=DB::table('command_set')
				->where('command_set.id', '=' ,$id)
				->delete(); 
			return redirect()
				->action('CommandController@home');
		}
}
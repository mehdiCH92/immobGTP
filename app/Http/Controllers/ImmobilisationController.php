<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Immobilisation;
use App\Http\Requests\immobilisationRequest;
use PDF;
use App\Branche;
use App\Derection;
use App\Service;
use Excel;
use App\Pvreform;
use App\Marque;
use App\Fourniseur;
use App\Ammortisement;
use DB;
use Hash;
use App\User;
class ImmobilisationController extends Controller 
{    
  
    public function __construct(){

        $this->middleware('auth');
    }

    public function index(){

    
       // $listimmob = Immobilisation::all();
       $listimmob = DB::table('immobilisations')->where('date_sortie','=',null)->get();

        return view('immob.index',['lim' => $listimmob]);

    }
    public function marque(){

    
        $listmarque = Marque::all();

        return view('immob.marque',['lim' => $listmarque]);

    }
    public function fourniseur(){

    
        $listefour = Fourniseur::all();

        return view('immob.fourniseur',['lim' => $listefour]);

    }

    public function marque_st(Request $req){

        $i = new Marque();
        $i->marque = $req->input('marque');
        $i->save();
        return redirect()->back();

    }
    public function fourniseur_st(Request $req){

        $i = new Fourniseur();
        $i->fourniseur = $req->input('fourniseur');
        $i->save();
        return redirect()->back();

    }
    public function marquedel(Request $req , $id){
        
        $im = Marque::find($id);
        $im->delete();
        return redirect()->back();
        
    }
    public function fourniseurdel(Request $req , $id){
        
        $im = Fourniseur::find($id);
        $im->delete();
        return redirect()->back();
        
    }
    public function create(){
        $br= new Branche();
        $brs=$br::all();
        $der= new Derection();
        $ders=$der::all();
        $ser= new Service();
        $sers=$ser::all();
        $mar= new Marque();
        $marr=$mar::all();
        //$listimmob = Immobilisation::all();
        $listimmob = DB::table('immobilisations')->where('date_sortie','=',null)->get();
        $erreur="";
        return view('immob.create_m',['br'=>$brs,'der'=>$ders,'ser'=>$sers,'lim' => $listimmob,'mar' => $marr,'err'=>$erreur]);

    }
    public function store( immobilisationRequest $req){
        
        $i = new Immobilisation();
        $i->desingnation = $req->input('nome_immob');
        $i->service = $req->input('service');
        $i->localisation = $req->input('localisation');
        $i->code_bar = $req->input('code_bare');
        $i->date_acc= $req->input('date_acc');
        $i->num_pv_rec = $req->input('pv_recep');
        $i->num_pv_cod = $req->input('pv_cod');
        $i->num_serie = $req->input('num_serie');
        $i->derection = $req->input('derection');
        $i->prix_acci = $req->input('prix_acc');
        $i->num_mat = $req->input('num_mat');    
        $i->num_comp_c = $req->input('compte_comp');
        $i->code_comptable= $req->input('code_comp');
        $i->TVA = $req->input('TVA');
        $i->type_actif = $req->input('type_immo');
        $i->TTC = $req->input('TTC');
        $i->HOR_TAX = $req->input('hore_tax');
        $i->situation = $req->input('situation');
        $i->num_inv = $req->input('inv');
        $i->taux_am  = $req->input('T_am');

        $i->save();
        
    }
    public function store_1( immobilisationRequest $req){
        
        $imo = new Immobilisation();
       $code=$req->input('code_bare');
       $co=DB::table('immobilisations')->where('code_bar', $code)->first();
     if(empty($co))
     {
        $cont=$req->input('contite');
       $k=1;
       $j=0;
       for($k=1;$k<($cont+1);$k++)
       {
           $data[$k] = ['desingnation' => $req->input('nome_immob'),
            'service' => $req->input('service'),
            'localisation' => $req->input('localisation'),
            'code_bar' => ($req->input('code_bare')+$j),
            'date_acc'=> $req->input('date_acc'),
            'num_pv_rec' => $req->input('pv_recep'),
            'num_pv_cod' => $req->input('pv_cod'),
            'num_serie' => ($req->input('num_serie')+$j),
            'derection' => $req->input('derection'),
            'prix_acci' => $req->input('prix_acc'),
            'num_mat' => ($req->input('num_mat')+$j),    
            'num_comp_c' => $req->input('compte_comp'),
            'code_comptable'=> $req->input('code_comp'),
            'TVA' => $req->input('TVA'),
            'type_actif' => $req->input('type_immo'),
            'TTC' => $req->input('TTC'),
            'HOR_TAX' => $req->input('hore_tax'),
            'situation' => $req->input('situation'),
            'prop_reforme'=>0,
            'num_inv' => ($req->input('inv')+$j),
            'taux_am'  => $req->input('T_am'),
            'marque'  => $req->input('marque'),
            'fourniseur'  => $req->input('fourniseur'),
            'vnc'  => $req->input('prix_acc'),];
           $j=$j+1;
       }
       Immobilisation::insert($data);
        return redirect('immob');
     }else
     {
        $maxValue = Immobilisation::max('code_bar');
        $br= new Branche();
        $brs=$br::all();
        $der= new Derection();
        $ders=$der::all();
        $ser= new Service();
        $sers=$ser::all();
        $mar= new Marque();
        $marr=$mar::all();
        //$listimmob = Immobilisation::all();
        $listimmob = DB::table('immobilisations')->where('date_sortie','=',null)->get();
        $erreur="linsertion reffuser inserer un code bare superieur as (".$maxValue.") pour que linsertion soit accepter";
        return view('immob.create_m',['br'=>$brs,'der'=>$ders,'ser'=>$sers,'lim' => $listimmob,'err'=>$erreur,'mar'=>$marr]);

     }
        
    }


    public function edit_1($id){

        $im= Immobilisation::find($id);
        return view('immob.create_comptable',['m'=>$im]);

    }



    public function store_2( Request $req,$id){
        
        $i = Immobilisation::find($id);
        $pv = $i->num_pv_rec;

        DB::table('immobilisations')
            ->where('num_pv_rec', $pv)
            ->update(['desingnation' => $req->input('nome_immob'),
            'service' => $req->input('service'),
            'localisation' => $req->input('localisation'),
            
            'date_acc'=> $req->input('date_acc'),
            'num_pv_rec' => $req->input('pv_recep'),
            'num_pv_cod' => $req->input('pv_cod'),
            
            'derection' => $req->input('derection'),
            'prix_acci' => $req->input('prix_acc'),
              
            'num_comp_c' => $req->input('compte_comp'),
            'code_comptable'=> $req->input('code_comp'),
            'TVA' => $req->input('TVA'),
            'type_actif' => $req->input('type_immo'),
            'TTC' => $req->input('TTC'),
            'HOR_TAX' => $req->input('hore_tax'),
            'situation' => $req->input('situation'),
           
            'taux_am'  => $req->input('T_am'),]);


        return redirect('immob');
        
    }
    public function edit($id){

        $im= Immobilisation::find($id);
        return view('immob.edit',['im'=>$im]);

    }
    public function update(immobilisationRequest $req , $id){

        $im = Immobilisation::find($id);
        $im->num_comp_c = $req->input('compte_comp');
        $im->desingnation = $req->input('nome_immob');
        $im->service = $req->input('service');
        $im->localisation = $req->input('localisation');
        $im->code_bar = $req->input('code_bare');
        $im->date_acc= $req->input('date_acc');
        $im->num_pv_rec = $req->input('pv_recep');
        $im->num_pv_cod = $req->input('pv_cod');
        $im->num_serie = $req->input('num_serie');
        $im->derection = $req->input('derection');
        $im->num_inv = $req->input('inv');
        $im->type_actif = $req->input('entre');
        $im->code_comptable= $req->input('code_comp');
        $im->type_actif = $req->input('type_immo');
        $im->prix_acci = $req->input('prix_acc');
        $im->TVA = $req->input('TVA');
        $im->num_mat = $req->input('num_mat');
        $im->TTC = $req->input('TTC');
        $im->HOR_TAX = $req->input('hore_tax');
        $im->situation = $req->input('situation');
        $im->taux_am  = $req->input('T_am');
        $im->save();
        return redirect('immob');

    }
    public function destroy(Request $req , $id){
        
        $im = Immobilisation::find($id);
        $im->delete();
        return redirect('immob');


        
    }
    public function delete(Request $req , $id){
        
        $im = Branche::find($id);
        $im->delete();
        return redirect()->back();


        
    }
    public function drdelete(Request $req , $id){
        
        $im = Derection::find($id);
        $im->delete();
        return redirect()->back();   
    }
    public function serdelete(Request $req , $id){
        
        $im = Service::find($id);
        $im->delete();
        return redirect()->back();   
    }
    public function show($id){
       
        $am= new Ammortisement();
        $im= Immobilisation::find($id);
        $amm = $am::where('id_i','=', $id)->get();
       
        return view('immob.show',['im'=>$im,'amor'=>$amm]);

    }
    public function imprimer($id){

        $am= new Ammortisement();
        $im= Immobilisation::find($id);
        $amm = $am::where('id_i','=', $id)->get();
        //$im= Immobilisation::find($id);
       $pdf = PDF::loadView('immob.pdf',['im'=>$im,'amor'=>$amm]);
       PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
       return $pdf->stream('pdfview.pdf');    
        
    }
    public function branche(){

        $br = Branche::all();
        return view('immob.branche',['br'=>$br]);

    }
    public function brStore(Request $req){

        $br = new Branche();
        $br->branche = $req->input('branche');
        $br->save();
        
        return redirect()->back();

    }
    public function derection(){
        $dr=Derection::all();
        return view('immob.derection',['dr'=>$dr]);

    }
    public function derStore(Request $req){
        $der = new Derection();
        $der->derection = $req->input('derection');
        $der->save();
        return redirect()->back();

    }
    public function service(){

        $d= new Derection();
        $de=$d::all();
        $ser=Service::all();
        return view('immob.service',['der'=>$de,'se'=>$ser]);

    }
    public function serStore(Request $req){
        $se = new Service();
        $se->service = $req->input('service');
        $se->derection = $req->input('derection');
        $se->save();
        return redirect()->back(); 

    }
    public function excel(Request $req)
    {
        
           $path = $req->file('select')->getRealPath();

          /*  $data = Excel::load($path)->get();

            if($data->count() > 0)
            {
            foreach($data->toArray() as  $value)
            {
            foreach($value as $row)
            {
                $insert = [
                'num_comp_c'=>$value['num_comp_c'],
                'desingnation'=>$value['desingnation'],
                'derection'=>$value['derection'],
                'service'=>$value['service'],
                'localisation'=>$value['localisation'],
                'code_bar'=>$value['code_bar'],
                'date_acc '=>$value['date_acc'],
                'num_inv'=>$value['num_inv'],
                'num_pv_rec' =>$value['num_pv_rec'],
                'num_pv_cod'=>$value['num_pv_cod'],
                'num_serie'=>$value['num_serie'],
                
                'num_mat'=>$value['num_mat'],
                'prop_reforme'=>$value['prop_reforme'],
                'code_comptable'=>$value['code_comptable'],
                'type_actif'=>$value['type_actif'],
                'prix_acci'=>$value['prix_acci'],
                'taux_am'=>$value['taux_am'],
               'TVA'=>$value['tva'],
               'TTC'=>$value['ttc'],
               'HOR_TAX'=>$value['hor_tax'],

                'situation'=>$value['situation'],
                'created_at'=>$value['created_at'],
                'updated_at'=>$value['updated_at'],
                
                ];
          
            //}
            }

            if(!empty($insert))
            {
            //DB::table('immobilisations')->insert($insert);
            $i = new Immobilisation();
       
            $i->desingnation = $insert['nome_immob'];
            $i->service = $insert['service'];
            $i->localisation = $insert['localisation'];
            $i->code_bar = $insert['code_bare'];
            $i->date_acc= $insert['date_acc'];
            $i->num_pv_rec = $insert['pv_recep'];
            $i->num_pv_cod = $insert['pv_cod'];
            $i->num_serie = $insert['num_serie'];
            $i->derection = $insert['derection'];
            $i->prix_acci = $insert['prix_acc'];
            $i->num_mat = $insert['num_mat'];    
            $i->num_comp_c = $insert['compte_comp'];
            $i->code_comptable= $insert['code_comp'];
            $i->TVA = $insert['TVA'];
            $i->type_actif = $insert['type_immo'];
            $i->TTC = $insert['TTC'];
            $i->HOR_TAX = $insert['hore_tax'];
            $i->situation = $insert['situation'];
            $i->num_inv = $insert['inv'];
            $i->taux_am  = $insert['T_am'];
    
            $i->save();
            }
            }
            return back()->with('success', 'Excel Data Imported successfully.');*/

            $data = Excel::load($path, function($reader) {
            })->get();

     if(!empty($data) && $data->count())
    {
        $data = $data->toArray();
        for($i=0;$i<count($data);$i++)
        {
        $dataImported[] = $data[$i];
        }
            }
        Immobilisation::insert($dataImported);
        return redirect('immob');
                
    }

    public function recherche(Request $req){

        $id = $req->input('id');
        
        if(!empty($id))
        {
        $im = DB::table('immobilisations')->where('num_comp_c', $id)->get();
        return view('immob.recherche',['m'=>$im]);
        }else{
            return view('immob.recherche',['h'=>'le numero compte comptable est introuvable']);
        }

    }
    public function register(){
        $li= new User();
        $l=$li::all();
        return view('admin.register',['lim'=>$l]);
    }
    public function registerStor(Request $req){

        $i = new User();
        $i->role = $req->input('role');
        $i->name = $req->input('name');
        $i->email = $req->input('email');
       
        $i->remember_token = $req->input('Token');
        $pass = $req->input('password');
        $pass = Hash::make($pass);
        $i->password = $pass;
        $i->save();
        return redirect()->back(); 

    }
    public function userD($id){
        $u = DB::table('users')->where('id','=',$id)->get();
        return view('admin.userdel',['lim' => $u]);
    }
    public function userDel($id){
        $u = User::find($id);
        $u->delete(); 
        $li= new User();
        $l=$li::all();
        return view('admin.register',['lim'=>$l]);
    }
    public function trans(){

    
        //$listimmob = Immobilisation::all();
        $listimmob = DB::table('immobilisations')->where('date_sortie','=',null)->get();
        return view('immob.transfaire',['lim' => $listimmob]);

    }
    public function badale( $id){

        $im = Immobilisation::find($id);
        $br= new Branche();
        $brs=$br::all();
        $der= new Derection();
        $ders=$der::all();
        $ser= new Service();
        $sers=$ser::all();

        return view('immob.badale',['im'=>$im,'br'=>$brs,'der'=>$ders,'ser'=>$sers]);

    }
    public function ba(Request $req,$id){

        $im = Immobilisation::find($id);

        $im->service = $req->input('service');
        $im->localisation = $req->input('localisation');
        $im->derection = $req->input('derection');
        $im->etat = $req->input('etat');
        $im->descEtat = $req->input('descetat');
        $im->save();
        //$listimmob = Immobilisation::all();
        $listimmob = DB::table('immobilisations')->where('date_sortie','=',null)->get();
        return view('immob.transfaire',['lim' => $listimmob]);
      

    }
    public function proposer(){

        //$listimmob = Immobilisation::all();
        $z = 0;
       $listimmob = DB::table('immobilisations')->where('prop_reforme', $z)->where('date_sortie', null)->get();
        return view('immob.proposer',['lim' => $listimmob]);

    }
    public function oser($id){

        $mob = Immobilisation::find($id);
        $mob->prop_reforme = 1;
        $mob->save();
        return view('immob.masqu_pr',['m' => $mob]);

    }
    public function rfstore(Request $req,$id){
        $mob = Immobilisation::find($id);

        $im = DB::table('pvreforms')->where('id_i', $id)->first();
        if(empty($im))
        {
        $pv = new Pvreform();
        $pv->id_i = $mob->id; 
        $pv->code_bar = $mob->code_bar; 
        $pv->description = $req->input('desc');
        $pv->date_reforme = date('d F Y');
        $pv->vu = 0;
        $pv->save();
        //$listimmob = Immobilisation::all();
        $z = 0;
        
        //$listimmob = DB::table('immobilisations')->where('prop_reforme', $z)->get();
        $listimmob = DB::table('immobilisations')->where('prop_reforme', $z)->where('date_sortie', null)->get();
        $message="le bien est proposer pour la reforme  ";

        return view('immob.proposer',['lim' => $listimmob,'mes'=>$message]);
        }else{
            //$listimmob = Immobilisation::all();
            $z = 0;
            //$listimmob = DB::table('immobilisations')->where('prop_reforme', $z)->get();
            $listimmob = DB::table('immobilisations')->where('prop_reforme', $z)->where('date_sortie', null)->get();
            $message="le bien est deja proposer pour la refforme";

            return view('immob.proposer',['lim' => $listimmob,'mess'=>$message]); 
        }

    }

    public function prin($id)
    {
        
        $im= Immobilisation::find($id);
        return view('immob.prin',['im'=>$im]);
        
    }







}

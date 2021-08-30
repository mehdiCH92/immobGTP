<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Immobilisation;
use App\Pvreform;
use DB;
use App\Sortie;
use App\Imobph;
use App\Ammortisement;
use Carbon\Carbon;
use Excel;
use App\Bpro;
use App\Branche;
use App\Derection;
use App\Service;
use App\Compt;

class ComptableController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }
    public function sortie(){
        

       // $imob = Pvreform::join('immobilisations', 'id_i', '=', 'immobilisations.id')
              //    ->get();
             // $imob = Immobilisation::join('pvreforms', 'id_i', '=', 'immobilisations.id')
               //  ->get();
               $imob = DB::table('immobilisations')
                ->join('pvreforms', function ($join) {
                    $join->on('immobilisations.id', '=', 'pvreforms.id_i')
                        ->where('immobilisations.date_sortie', '=', null);
                })
                ->get();
       

        
        return view('comptable.sortie',['lim'=>$imob]);

    }
    public function del(Request $req , $id){
        $im= Immobilisation::find($id);
        $im->prop_reforme = 0;
        $im->save();   
        //$im = DB::table('pvreforms')->where('id_i', $id)->first();
        //DB::delete('DELETE FROM users WHERE id = ?', [$id]);
        Pvreform::where('id_i', $id)->forceDelete();
 
        return redirect()->back();
        
    }

    public function sortie_ref($id)
    {
        $imob = Immobilisation::where('id', $id)->first();
        $pvr = Pvreform::where('id_i', $id)->first();
      
     return view('comptable.sortie_ref',['lim'=>$imob,'pv'=>$pvr]);
    }
    public function sortieSt(Request $req,$id)
    {
        
        $im =Immobilisation::find($id);
       $date=date_create($req->input('seance'));
       $d=date_format($date,"Y/m/d");
       
       $im->date_sortie = $d;
       $so = new Sortie();
       $so->id_i = $id;
        $so->numero_commition = $req->input('numero_commition');
        $so->nom_commition = $req->input('nom_commition');
        $so->nombre_de_commition = $req->input('nombre_de_commition');
        $so->seance = $req->input('seance');
        $so->unite = $req->input('unite');
        $so->num_dossier = $req->input('num_dossier');
        $so->type_sortie = $req->input('type_sortie');
        $so->description = $req->input('description');
        $so->desition = $req->input('desition');
        $so->save();
        sleep(1);
        $im->save();
       
       // Immobilisation::where('id', $id)->forceDelete();
        //return redirect('sortie');

        $imob = DB::table('immobilisations')
        ->join('pvreforms', function ($join) {
            $join->on('immobilisations.id', '=', 'pvreforms.id_i')
                ->where('immobilisations.date_sortie', '=', null);
        })
        ->get();
        return view('comptable.sortie',['lim'=>$imob]);
    }

    public function ammorti()
    {
        $listimmob = Immobilisation::all();
     
        return view('comptable.ammorti',['lim' => $listimmob]);
    }

    public function ammorti_pro()
    {
        $listimmob = Immobilisation::all();
     
        return view('comptable.ammorti_provi',['lim' => $listimmob]);
    }

    
    public function regularisation()
    {
        $listimmob = Immobilisation::all();
     
        return view('comptable.regularisation',['lim' => $listimmob]);
    }

    public function bil()
    {
        return view('comptable.bilant_anée');
    }

    public function bilant(Request $req)
    {
        

       /* $imob = Immobilisation::join('ammortisements', 'id_i', '=', 'immobilisations.id')
        ->get();*/
        $annee = $req->input('annee');
        
        /*$imob = DB::table('immobilisations')
        ->join('ammortisements', function ($join) {
            $join->on('immobilisations.id', '=', 'ammortisements.id_i')
                ->where('ammortisements.annee','=',$annee);
        })
        ->get();*/

       /* $imob = DB::table('immobilisations')
                ->join('ammortisements', 'immobilisations.id', '=', 'ammortisements.id_i')
                ->where('ammortisements.annee','=',$annee)
                ->get();*/
                $imob = Immobilisation::join('ammortisements', 'id_i', '=', 'immobilisations.id')->where('ammortisements.annee','=',$annee)
                ->get();
        return view('comptable.bilant_amort',['im'=>$imob,'an'=>$annee]);
    }

    public function print_bi()
    {
        $imob = Immobilisation::join('ammortisements', 'id_i', '=', 'immobilisations.id')
        ->get();
       
     
        return view('comptable.print_bilant',['im'=>$imob]);
    }



public function calcam(Request $req)
{
    ini_set('max_execution_time', 5000);
        $listimmob = Immobilisation::all();
        $DatT = $req->input('termine');
        $z = $req->input('Annee');
        $anT =date("Y",strtotime($DatT));
        $mT = date("m",strtotime($DatT));
        
        foreach($listimmob as $l)
        {
         if($l->TVA <> 0)
         {
            $im= Immobilisation::find($l->id); 
            $am = new Ammortisement();
            $taux = $l->taux_am;
            $date = $l->date_acc;
            $prix = $l->vnc;
            $m = date("m",strtotime($date));
            $annA = date("Y",strtotime($date));
            $j = date("d",strtotime($date));
            
            if($j > 15 && $m <> 12)
            {
                $m=$m+1;
            }
            
          if($annA <= $anT)
            {
                    if($l->prix_acci == $l->vnc)
                    {                
                        $mois=$mT-$m;
                        if($mois > 0)
                        {
                            $taux_i = ($mois*$taux)/12;
                            $val_am = ($l->prix_acci*$taux_i)/100;
                            $vnc = $prix-$val_am;
                            if($vnc < 0)
                            {
                                $vnc=0;
                            }
                            $am->id_i =$l->id;
                            $am->date_operation= date('d F Y');     
                            $am->annee= $anT;
                            $am->montant = $val_am;
                            $am->vnc =$vnc;
                            $im->vnc =$vnc;
                            $am->save();
                            $im->save();
                        }
                    }else if(($l->prix_acci != $l->vnc) AND ($l->date_sortie == null))
                    {
                        $mois=12;
                        $val_am = ($l->prix_acci*$taux)/100;
                        $vnc = $prix-$val_am;
                        $am->id_i =$l->id;
                        $am->date_operation= date('d F Y');
                        $am->annee= $anT;
                        $am->montant = $val_am;
                        if($vnc < 0)
                        {
                            $vnc=0;
                        }
                        $am->vnc =$vnc;
                        $im->vnc =$vnc;
                        $am->save();
                        $im->save();

                    }else if($l->date_sortie <> null)
                    {
                        $s=$l->date_sortie;
                       // $d=date('d F Y');
                        $year_s = date("Y",strtotime($s));
                        $mp = date("m",strtotime($s));
                        $jr = date("d",strtotime($s));
                       // dd($year_s);
                        if($jr > 15 && $mp <> 12)
                        {
                            $mp=$mp+1;
                        }
                        $year_a = $anT;
                        if($year_s==$year_a AND $mp <=  $mT )
                        {
                            //$m = date("m",strtotime($s));
                            $mois=$mp;
                            $taux_i = ($mois*$taux)/12;
                            $val_am = ($l->prix_acci*$taux_i)/100;
                            $vnc = $prix-$val_am;
                            $am->id_i =$l->id;
                            $am->date_operation= date('d F Y');
                            $am->annee= $anT;
                            $am->montant = $val_am;
                            if($vnc < 0)
                            {
                                $vnc=0;
                            }
                            $am->vnc =$vnc;
                            $im->vnc =$vnc;
                            $am->save();   
                            $im->save();

                        }

                    }
            }
        }
                 
        }
        $listam = Ammortisement::all();
       // $d=date('d F Y');
       // $year_a = date("Y",strtotime($d));
        
        foreach($listam  as $am)
        {
            $y=$am->date_operation;
            $year_b = date("Y",strtotime($y));
           // if($am->observation == 'REV')
           // {
                foreach($listam as $as)
                {
                    if($am->annee==$as->annee AND $am->id_i == $as->id_i AND $am->id <> $as->id)
                    {
                        if($am->vnc < $as->vnc)
                        {
                            Ammortisement::where('id', $as->id)->forceDelete();
                           // sleep(1);
                            $im= Immobilisation::find($am->id_i);
                            $im->vnc = $am->vnc; 
                            $im->save();

                        }else
                        {
                            Ammortisement::where('id', $am->id)->forceDelete();
                          //  sleep(1);
                            $im= Immobilisation::find($am->id_i);
                            $im->vnc = $as->vnc; 
                            $im->save();
                        }
                    }
               // }
            }

        }


       $imob = Immobilisation::join('ammortisements', 'id_i', '=', 'immobilisations.id')->where('ammortisements.annee', '=',$z)
        ->get();

      /*  $imob = DB::table('immobilisations')
        ->join('ammortisements', function ($join) {
            $join->on('immobilisations.id', '=', 'ammortisements.id_i')
                ->where('ammortisements.annee', '=',$z);
        })
        ->get();*/
       
     
        return view('comptable.bilant_amort',['im'=>$imob]);

    }

    public function regul($id){

        return view('comptable.reg',['id'=>$id]);

    }


    public function reg(Request $req)
    {
        $id = $req->input('id');  
        $DatT = $req->input('termine');
        $anT =date("Y",strtotime($DatT));
        $mT = date("m",strtotime($DatT));

            $l = Immobilisation::find($id); 
 
            $am = new Ammortisement();
            $date_acc=$l->date_acc;
            $day = date("d",strtotime($date_acc));
            $mi = date("m",strtotime($date_acc));
            $y = date("y",strtotime($date_acc));
            if($day>16)
            {
                
                $mi=$mi+1;
                if($mi>12)
                {
                    $mi=1;
                    $y=$y+1;
                }
            }
            $date_a= $y.'-'.$mi.'-'.$day;
            $date_ac =  new Carbon ($date_a);
           
          // $d=date('d F Y');
           // $year = date("Y",strtotime($d));
           // $dat = $year.'-12-31';
           // $d1 =  new Carbon ($dat);
           $d1 =  new Carbon ($DatT);
            //$jour = $date_ac->diff($d1)->format('%a');
            $mois = $date_ac->diff($d1)->m+1;
            
            $ye = $date_ac->diff($d1)->y;
            $mois = ($ye*12)+$mois;
         
            $taux = $l->taux_am;
            $date = $l->date_acc;
            $prix = $l->vnc;
            $taux_i = ($mois*$taux)/12;
            $val_am = ($prix*$taux_i)/100;
            $vnc = $prix-$val_am;
            $am->id_i =$l->id;
            $am->date_operation= date('d F Y');
            $am->annee= $anT;
            $am->montant = $val_am;
            $am->observation = "REV";
            if($vnc < 0)
            {
                $am->vnc =0;
                $am->montant = $prix;
                $l->vnc =0;
            }else
            {
                $am->vnc =$vnc;
                $l->vnc =$vnc;
            }

            $am->save();
            //sleep(3);
            $l->save();
            $listam = Ammortisement::all();
            // $d=date('d F Y');
            // $year_a = date("Y",strtotime($d));
             
             foreach($listam  as $am)
             {
                 $y=$am->date_operation;
                 $year_b = date("Y",strtotime($y));
                // if($am->observation == 'REV')
                // {
                     foreach($listam as $as)
                     {
                         if($am->annee==$as->annee AND $am->id_i == $as->id_i AND $am->id <> $as->id)
                         {
                             if($am->vnc > $as->vnc)
                             {
                                 Ammortisement::where('id', $as->id)->forceDelete();
                                // sleep(1);
                                 $im= Immobilisation::find($am->id_i);
                                 $im->vnc = $am->vnc; 
                                 $im->save();
     
                             }else
                             {
                                 Ammortisement::where('id', $am->id)->forceDelete();
                               //  sleep(1);
                                 $im= Immobilisation::find($am->id_i);
                                 $im->vnc = $as->vnc; 
                                 $im->save();
                             }
                         }
                    // }
                 }
     
             }           
            
            $imob = Immobilisation::join('ammortisements', 'id_i', '=', 'immobilisations.id')
            ->get();
           
         
            return view('comptable.bilant_amort',['im'=>$imob]);
    
        }

     public function importer(){
        $im = Imobph::All();
         return view('approchemment.importer_inv',['im'=>$im]);
     }

     public function excel(Request $req)
     {
        $path = $req->file('select')->getRealPath();

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
            Imobph::insert($dataImported);
            $im = Imobph::All();
            return view('approchemment.importer_inv',['im'=>$im]);

     }
     public function justifier()
     {
           /* $im = Immobilisation::crossJoin('imobphs');
            dd($im); */
            //Immobilisation::All()->whereNotExists('code_bar', [Imobph::all()])->get();
            $imph=[];
            $ims=[];
            $k=0;
            $imm = Immobilisation::All();
            $i = Imobph::All();
            foreach($imm as $itm)
            {
                foreach($i as $it)
                {
                    if($itm->code_bar == $it->code_bar)
                    {
                        $imph[$k] = $it->id;
                        $ims[$k] = $itm->id;
                        $k=$k+1;
                    }

                }
                   
            }
            
            $im = $i->whereNotIn('id', $imph);
            $imsy = $imm->whereNotIn('id', $ims);
            
         
            return view('approchemment.justification',['im'=>$im,'ims'=>$imsy]);

     }
     public function physdel($id)
     {
        $im = Imobph::find($id);
        $im->delete();
        return redirect()->back();
     }

     public function ajouter($id)
     {
        $im = Imobph::find($id);
        $i = new Immobilisation();
        $i->num_comp_c = $im->num_comp_c;
        $i->desingnation = $im->desingnation;
        $i->service = $im->service;
        $i->localisation = $im->localisation;
        $i->code_bar = $im->code_bar;
        $i->date_acc= $im->date_acc;
        $i->num_pv_rec = $im->pv_recep;
        $i->num_pv_cod = $im->pv_cod;
        $i->num_serie = $im->num_serie;
        $i->derection = $im->derection;
        $i->num_inv = $im->inv;
        $i->type_actif = $im->entre;
        $i->code_comptable= $im->code_comp;
        $i->type_actif = $im->type_immo;
        $i->prix_acci = $im->prix_acc;
        $i->TVA = $im->TVA;
        $i->num_mat = $im->num_mat;
        $i->TTC = $im->TTC;
        $i->HOR_TAX = $im->hore_tax;
        $i->situation = $im->situation;
        $i->taux_am  = $im->T_am;
        $i->marque = $im->marque;
        $i->fourniseur = $im->fourniseur;
        $i->vnc  = $im->vnc;
        $i->save();
        return redirect()->back();
     }

     public function sortie_re($id)
     {
       /* $mob = Immobilisation::find($id);
        $mob->prop_reforme = 1;
        $mob->save();
         $imob = Immobilisation::where('id', $id)->first();
         $pvr = Pvreform::where('id_i', $id)->first();
       dd($pvr);
      //return view('comptable.sortie_ref',['lim'=>$imob,'pv'=>$pvr]);*/
      $mob = Immobilisation::find($id);
      $mob->prop_reforme = 1;
      $mob->save();
      return view('immob.masqu_pr',['m' => $mob]);
     }


     public function calcamPro(Request $req)
     {
        $listimmob = Immobilisation::all();

        $Annee = $req->input('Annee');

        $DatT = $req->input('termine');
        $anT =date("y",strtotime($DatT));
        $mT = date("m",strtotime($DatT));
        $jT = date("d",strtotime($DatT));
        if($jT>16)
        {
            
            $mT=$mT+1;
            if($mT>12)
            {
                $mT=1;
                $anT=$anT+1;
            }
        }

        $DatTt = $anT.'-'.$mT.'-'.$jT;
        $d1 =  new Carbon ($DatTt);

        $DatC = $req->input('commance');
        $anC =date("y",strtotime($DatC));
        $mC = date("m",strtotime($DatC));
        $jC = date("d",strtotime($DatC));

        if($jC>16)
        {
            
            $mC=$mC+1;
            if($mC>12)
            {
                $mC=1;
                $anC=$anC+1;
            }
        }

        $DatTc = $anC.'-'.$mC.'-'.$jC;
        $d2 =  new Carbon ($DatTc);
        $T = array();
        $i=1;
        foreach($listimmob as $l)
        {
            $num_comp_c= $l->num_comp_c;
            $desingnation=$l->desingnation;
            $code_bar = $l->code_bar;

            $taux = $l->taux_am;
            $prix = $l->prix_acci;
            $date_acc=$l->date_acc;
            $day = date("d",strtotime($date_acc));
            $mi = date("m",strtotime($date_acc));
            $y = date("y",strtotime($date_acc));
            if($day>16)
            {
                
                $mi=$mi+1;
                if($mi>12)
                {
                    $mi=1;
                    $y=$y+1;
                }
            }
            $date_a= $y.'-'.$mi.'-'.$day;
            $date_ac =  new Carbon ($date_a);
            $moist = $date_ac->diff($d1)->m+1;
                    
            $yet = $date_ac->diff($d1)->y;
            $moist = ($yet*12)+$moist;
            $taux_t = ($moist*$taux)/12;
            $val_amt = ($prix*$taux_t)/100;

            $moisc = $date_ac->diff($d2)->m+1;
            
            $yec = $date_ac->diff($d2)->y;
            $moisc = ($yec*12)+$moisc;
            if($y < $anT)
            {
                    $taux_c = ($moisc*$taux)/12;
                    $val_amc = ($prix*$taux_c)/100;

                    $val_am = $val_amt - $val_amc;
                    $vnc = $prix-$val_am;
                    $id_i =$l->id;
                    $date_operation= date('d F Y');
                
                    $montant = $val_am;
                    $observation = "";
                    if($vnc < 0)
                    {
                        $vnc =0;
                        $montant = $prix;
                        $l->vnc =0;
                    }else
                    {
                        $vnc =$vnc;
                        $l->vnc =$vnc;
                    }
                    if($montant < 0)
                    {
                        
                        $montant = $montant*(-1);
                        
                    }

                /*$T[$i] = array('id_i'=>$l->id,'date_operation'=>$date_operation,'annee'=>$Annee,'montant'=>$montant,'vnc'=>$vnc,'date_d'=>$DatC,'date_f'=>$DatTt,'num_comp_c'=>$num_comp_c,'desingnation'=>$desingnation,'code_bar'=>$code_bar,'prix_acci'=>$l->prix_acci);
                    $i=$i+1;*/
                $b = new Bpro();
                $b->id_i=$l->id;
                $b->date_operation=$date_ac;
                $b->annee=$Annee;
                $b->montant=$montant;
                $b->vnc=$vnc;
                $b->date_d=$DatC;
                $b->date_f=$DatTt;
                $b->num_comp_c=$num_comp_c;
                $b->desingnation=$desingnation;
                $b->code_bar=$code_bar;
                $b->prix_acci=$l->prix_acci;
                $b->save();

            }
        }

        $bt= Bpro::All();
        foreach($bt as $b)
        {
            Bpro::where('id', $b->id)->forceDelete();
        }
         
        return view('comptable.bilant_provi',['im' => $bt]);

     
    }

    public function compte(){
        $co = new Compt();
        $c= $co::All();
        $der = new Derection();
        $de = $der::All();
        $ser = new Service();
        $se = $ser::All();
        return view('comptable.compte',['de'=>$de,'se'=>$se,'co'=>$c]);

    }
    public function stcomp(Request $req){
        $co = new Compt();
        $co->compte = $req->input('compte');
        $co->service = $req->input('service');
        $co->derection = $req->input('derection');
        $co->save();
        $der = new Derection();
        $de = $der::All();
        $ser = new Service();
        $se = $ser::All();
        $cop = new Compt();
        $c= $cop::All();
        return view('comptable.compte',['de'=>$de,'se'=>$se,'co'=>$c]);
       
    }

    public function comdelete($id){
        $co = Compt::find($id);
        $co->forceDelete();
        return redirect()->back();
    }










}

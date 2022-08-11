<?php

namespace App\Http\Livewire;

use DB;
use Livewire\validate;
use Livewire\Component;
use App\Models\LOCATAIRE;
use App\Models\Delete_renter;



class Locataires extends Component
{

    public  $name;
    public  $lastname;
    public  $ville;
    public  $email;
    public  $number;
    public  $cni;
    public  $date;
    public $edit_id;
    public $delete_id;
    public $renter_id;

    // public $allData = [];
    protected $rules = [
        'name' => 'required|',
        'lastname' => 'required|',
        'email' => 'required|email',
        'ville' => 'required',
        'number' => 'required',
        'cni' => 'required',
        'date' => 'required',
    ];

    //input fields on update validation 
    public function updated($fields){
        $this->validateOnly($fields,[
            'name' => 'required|',
             'lastname' => 'required|',
             'email' => 'required|email',
             'ville' => 'required|',
             'number' => 'required|numeric',
             'cni' => 'required|',
             'date' => 'required|',
     ]);
    }
     
     public function submit()
     {
        //on form submit validation
        $this->validate([
            'name' => 'required',
             'lastname' => 'required',
             'email' => 'required|email',
             'ville' => 'required',
             'number' => 'required|numeric',
             'cni' => 'required',
             'date' => 'required',
     ]);

     //add locataire data
     $locataire = new LOCATAIRE();

     $locataire->name=$this->name;
     $locataire->lastname=$this->lastname;
     $locataire->email=$this->email;
     $locataire->ville=$this->ville;
     $locataire->number=$this->number;
     $locataire->cni=$this->cni;
     $locataire->date=$this->date;


     $locataire->save();

     session()->flash('message', 'locataire enregistre avec succes');

    $this->name='';
    $this->lastname='';
    $this->email='';
    $this->ville='';
    $this->number='';
    $this->cni='';
    $this->date='';

     //For hide modal after add locataire
     $this->dispatchBrowserEvent('close-modal');

     }

     public function editLocataireData(){
           //on form submit validation
         $this->validate([
             'name' => 'required',
              'lastname' => 'required',
              'email' => 'required|email',
              'ville' => 'required',
              'number' => 'required|numeric',
              'cni' => 'required',
              'date' => 'required',
         ]);

             $locataire = LOCATAIRE::where('id' ,$this->edit_id)->first();
              $locataire->name=$this->name;
              $locataire->lastname=$this->lastname;
              $locataire->email=$this->email;
              $locataire->ville=$this->ville;
              $locataire->number=$this->number;
              $locataire->cni=$this->cni;
              $locataire->date=$this->date;


          $locataire->save();

         session()->flash('message', 'modifiez avec succes');
         
            //For hide modal after add locataire
             $this->dispatchBrowserEvent('close-modal');

     }

     public function resetInputs(){
        $this->name='';
        $this->lastname='';
        $this->email='';
        $this->ville='';
        $this->number='';
        $this->cni='';
        $this->date='';
        $this->edit_id='';
     }

     public function editLocataire($id){
        $locataire = LOCATAIRE::where('id' ,$id)->first();

        $this->edit_id= $locataire->id;
        $this->name = $locataire ->name;
        $this->lastname = $locataire ->lastname;
        $this->email = $locataire ->email;
        $this->ville = $locataire ->ville;
        $this->number = $locataire ->number;
        $this->cni = $locataire ->cni;
        $this->date = $locataire ->date;

        $this->dispatchBrowserEvent('show-edit-locataire-modal');
     }

     //delete confirmation
     public function deleteConfirmation($id){
        //   $locataire = LOCATAIRE::where('id',$id)->first();

          $this->delete_id = $id;//locataire id

          $this->dispatchBrowserEvent('show-delete-confirmation-modal');
     }

          //delete confirmation
          public function deleteLocataireData(){
            $locataire = LOCATAIRE::where('id',$this->delete_id)->first();
            $locataire -> delete();

            // $renter = LOCATAIRE::where('id',$this->renter_id)->first();
            // $name = $renter->name;
            // $lastname = $renter->lastname;
            // $email = $renter->email;
            // $ville = $renter->ville;
            // $number = $renter->number;
            // $cni = $renter->cal_info;
            // $date = $renter->dates;

            // $renter = Delete_renter::create([
            //     'name' => $renter->name,
            //     'lastname' => $lastname,
            //     'email' => $email,
            //     'ville' => $ville,
            //     'number' => $number,
            //     'cni' => $cni,
            //    'date'=> $date,
            // ]);

            // $renter->name=$this->name;
            // $renter->lastname=$this->lastname;
            // $renter->email=$this->email;
            // $renter->ville=$this->ville;
            // $renter->number=$this->number;
            // $renter->cni=$this->cni;
            // $renter->date=$this->date;
       
       
            // $renter->save();




            session()->flash('message', 'Supprimer avec succes');

            $this->dispatchBrowserEvent('close-modal');

            $this->delete_id='';
   
       }

       public function cancel(){
                 $this->delete_id='';
       }

       
    public function render()
        {
            //get all locataires
            $locataire = LOCATAIRE::all();
            return view('livewire.locataires',['locataire'=>$locataire]);
            
        }
}
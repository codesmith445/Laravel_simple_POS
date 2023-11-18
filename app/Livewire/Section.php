<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Section as SectionModel;

class Section extends Component
{   
    public $addMore = [1];
    public $count = 0;
    public $section_name, $section_status, $edit_id;
    public $sections = [['section_name' => '', 'section_status' => false]];
    public $section_id;
   // public $checked = [];
   // public $selectAll = false;


    public function AddMore() {
        if (count($this->sections) < 5) {
            $this->sections[] = ['section_name' => '', 'section_status' => false];
        }
       
    }

    public function Remove($index) {
          $this->count--;
          unset($this->addMore[$index]);
    }
    
    public function toggleStatus($index) {
        $this->sections[$index]['section_status'] = !$this->sections[$index]['section_status'];
    }

    public function store() {
        foreach($this->sections as $key => $sectionData) {
            SectionModel::create([
                'section_name' => $sectionData['section_name'],
                'section_status' => $sectionData['section_status'] ? 1 : 0,
            ]);
        }
        
        // Clear the sections array after storing the data
        $this->FormReset();
        $this->SwalMessageDialog('Section Inserted Sucessfully');
        
    }

   
   public function editSection($section_id) {
      $this->edit_id = $section_id;
      $section = SectionModel::findOrFail($section_id);
      $this->section_name = $section->section_name;
      $this->section_status = $section->section_status == 1;
   }


   public function update() {
    SectionModel::updateOrCreate(
        ['id' => $this->edit_id],
        [
        'section_name' => $this->section_name,
        'section_status' => $this->section_status ? 1 : 0,
     ]);
     $this->FormReset();
     $this->SwalMessageDialogupdate('Section Updated Sucessfully');
   } 
   
 //  public function isChecked($section_id) {
 //    return $this->checked && $this->selectAll ? 
 //       in_array($section_id, $this->checked) :
 //      in_array($section_id, $this->checked);
 //   }

//  public function updatedSelectAll($value) {
//         $value ? $this->checked = SectionModel::pluck('id') : $this->checked = [];
//       }

public $sectionsdata;
public $selectedItems = [];
public $selectAll = false;


public function mount()
{
    $this->sectionsdata = SectionModel::all();
}

public function deleteItems()
{
    if ($this->selectAll) {
        // If "Select All" is checked, delete all items
        SectionModel::query()->delete();
    } else {
        // If individual items are selected, delete only those
        SectionModel::destroy($this->selectedItems);
    }

    $this->resetSelectedItems();
}

public function resetSelectedItems()
    {
        $this->selectedItems = [];
        $this->selectAll = false;
    }
 
   public function ConfirmDelete($section_id, $section_name) {
      $this->dispatch('Swal:DeletedRecord', [
        'section_name' => $section_name,
        'title' => 'Are You Sure You Want to Delete? <span class="text-danger">' . $section_name . '</span>',
        'id' => $section_id,
      ]);
   }

   protected $listeners = ['RecordDeleted']; 

   public function RecordDeleted($section_id) {
       $sectiondelete = SectionModel::find($section_id);
       $sectiondelete->delete();
   }

   public function DeletedSection() {
    
   }

   public function SwalMessageDialogupdate($message) {
    $this->dispatch('MSGSuccessfullupdate', [
       'title' => $message,
    ]);
  }

   public function FormReset() {
    $this->sections = [['section_name' => '', 'section_status' => false]];
    $this->dispatch('closeModel');
   }
    
   public function SwalMessageDialog($message) {
     $this->dispatch('MSGSuccessfull', [
        'title' => $message,
     ]);
   }
   

    public function render()
    {   
        $sectionsdata = SectionModel::all();
        return view('livewire.section', compact('sectionsdata'));
    }
}

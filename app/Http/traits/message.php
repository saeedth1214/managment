<?php


namespace App\Http\traits;


trait message{

    public function setMessage($message="is ok",$type="success")
    {
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => $type,
            'message' => $message,
        ]);
    }

    public function confirmedMessage($message = "is ok", $name="",$type = "warning",$data=null)
    {
        $this->dispatchBrowserEvent('swal:'.$name, [
            'type' => $type,
            'message' => $message,
            'data'=>$data
        ]);
    }
    

}


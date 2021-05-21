<?php
include_once "functions.php";


class Alert{
    private $alert = "";
    
    public function setAlert($msg){
        $msg = strtolower($msg);
        if(startsWith($msg, "success")){
            $this->alert = "success";
        } else if(startsWith($msg, "warning")){
            $this->alert = "warning";
        } else if (startsWith($msg, "error")){
            $this->alert = "danger";
        } else if (startsWith($msg, "info")){
            $this->alert = "info";
        } else return "error";
        
    }

    public function invoke($msg){
        
        if ($this->alert == "success"){
            $this->success($msg);
        } else if ($this->alert == "warning"){
            $this->warning($msg);
        } else if ($this->alert == "danger"){
            $this->danger($msg);
        } else if ($this->alert == "info"){
            $this->info($msg);
        } else {
            echo $this->alert;
        }

    }

    public function success($msg){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
				'.$msg.'
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				</div>';
    }

    public function warning($msg){
				echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
				'.$msg.'
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				</div>';
    }

    public function danger($msg){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				'.$msg.'
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				</div>';
    }

    public function info($msg){
        echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
				'.$msg.'
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				</div>';
    }

}

?>
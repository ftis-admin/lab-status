<?php
class Service {
    private
        $status,
        $message,
        $title;
    
    public function __construct($status="up", $message="System are all up.", $title="System Up"){
        $this->status = $status;
        $this->message = $message;
        $this->title = $title;
    }

    public function build() {
        return [
            "status" => $this->status,
            "title" => $this->title,
            "message" => $this->message
        ];
    }
}
function build($data){
    return json_encode(array_map(function($data){return $data->build();}, $data));
}

$data = [
    "generic"=> new Service("down", "Our servers are in maintenance.", "On Maintenance"),
    "asd.labftis.net"=> new Service("down", "Our servers are in maintenance.", "On Maintenance"),
    "daa.labftis.net"=> new Service("down", "Our servers are in maintenance.", "On Maintenance"),
    "labftis.net"=> new Service("down", "Our server are in maintenance.", "On Maintenance"),
    "status.labftis.net"=> new Service("up", "Server dalam keadaan sehat.", "Berjalan normal")
];

file_put_contents("status.json", build($data));
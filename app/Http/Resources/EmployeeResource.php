<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'id' => $this->id,
                'salutation' => $this->Employees->salutation,
                'username' => $this->name,
                'street' => $this->Employees->street,
                'apartment' => $this->Employees->apartment,
                'city' => $this->Employees->city,
                'state' => $this->Employees->state,
                'Zcode' => $this->Employees->Zcode,
                'Hphone' => $this->Employees->Hphone,
                'Aphone' => $this->Employees->Aphone,
                'Pemail' => $this->Employees->Pemail,
                'nationalId' => $this->Employees->nationalId,
                'Krapin' => $this->Employees->Krapin,
                'nssf' => $this->Employees->nssf,
                'nhif' => $this->Employees->nhif,
                'Bankname' => $this->Employees->Bankname,
                'AccNo' => $this->Employees->AccNo,
                'Branchname' => $this->Employees->Branchname,
                'Branchcode' => $this->Employees->Branchcode,
                'dob' => $this->Employees->dob,
                'status' => $this->Employees->status,
                'spouseN' => $this->Employees->spouseN,
                'spouseE' => $this->Employees->spouseE,
                'spousePhone' => $this->Employees->spousePhone,
                'title' => $this->jobInfos->title,
                'EmployeeId' => $this->jobInfos->EmployeeId,
                'supervisor' => $this->jobInfos->supervisor,
                'department' => $this->jobInfos->department,
                'Wlocation' => $this->jobInfos->Wlocation,
                'Cphone' => $this->jobInfos->Cphone,
                'Wphone' => $this->jobInfos->Wphone,
                'Wemail' => $this->jobInfos->Wemail,
                'Sdate' => $this->jobInfos->Sdate,
                'Fname' => $this->emergency->Fname,
                'street' => $this->emergency->street,
                'apartment' => $this->emergency->apartment,
                'city' => $this->emergency->city,
                'state' => $this->emergency->state,
                'Zcode' => $this->emergency->Zcode,
                'Pphone' => $this->emergency->Pphone,
                'Aphone' => $this->emergency->Aphone,
                'relationship' => $this->emergency->relationship,
                'Images' => $this->images,
            ]
        ];
    }
}

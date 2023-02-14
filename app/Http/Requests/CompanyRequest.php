<?php
namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Input;
use Carbon\Carbon;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [            
            'company_name' => 'required',
            'head_office_address' => 'required',            
            'ntn_number' => 'required',
            'province_idFk' => 'required',
            'district_idFk' => 'required',
            'town_idFk' => 'required',
            
            'director_nic' => 'required|array|min:1',
            'director_name' => 'required|array|min:1',
            'director_present_add' => 'required|array|min:1',
            'director_permanent_add' => 'required|array|min:1',
            
            'director_nic.*' => 'required|min:1',
            'director_name.*' => 'required|min:1',
            'director_present_add.*' => 'required|min:1',
            'director_permanent_add.*' => 'required|min:1',
            
            'gazetted_officer_name' => 'required|array|min:2',
            'gazetted_officer_designation' => 'required|array|min:2',
            'gazetted_officer_add' => 'required|array|min:2',
            
            'gazetted_officer_name.*' => 'required|min:1',
            'gazetted_officer_designation.*' => 'required|min:1',
            'gazetted_officer_add.*' => 'required|min:1',
            
            'noc_ministry_inferior' => 'required|image|mimes:jpeg,png,jpg,gif,pdf,doc,docx,zip|max:5048',
            'memorandum_association' => 'required|image|mimes:jpeg,png,jpg,gif,pdf,doc,docx,zip|max:5048',
            'reg_certificate_secp' => 'required|image|mimes:jpeg,png,jpg,gif,pdf,doc,docx,zip|max:5048',
            'form_29_secp' => 'required|image|mimes:jpeg,png,jpg,gif,pdf,doc,docx,zip|max:5048',
            'director_nic_copy' => 'required|image|mimes:jpeg,png,jpg,gif,pdf,doc,docx,zip|max:5048',
            'undertaking_stamp' => 'required|image|mimes:jpeg,png,jpg,gif,pdf,doc,docx,zip|max:5048',
            'company_address_pic' => 'required|image|mimes:jpeg,png,jpg,gif,pdf,doc,docx,zip|max:5048',
            'director_photograph' => 'required|image|mimes:jpeg,png,jpg,gif,pdf,doc,docx,zip|max:5048',
            'director_ntn' => 'required|image|mimes:jpeg,png,jpg,gif,pdf,doc,docx,zip|max:5048',
                        
        ];
    }

    public function messages()
    {
        return [
            'company_name.required'=> 'Company Name is required',
            'head_office_address.required'=> "Head Office Address is required",
            'ntn_number.required'=> 'NTN Number is required',
            'province_idFk.required'=> "Province is required",
            'district_idFk.required'=> 'District is required',
            'town_idFk.required'=> "Town is required",  
            
            'director_nic.*.required'=> "Director NIC is required",
            'director_name.*.required'=> "Director Name is required",
            'director_present_add.*.required'=> "Director Present Address is required",
            'director_permanent_add.*.required'=> "Director Permanent Address is required",
            
            'gazetted_officer_name.*.required'=> "Gazetted Officer Name is required",
            'gazetted_officer_designation.*.required'=> "Gazetted Officer Designation is required",
            'gazetted_officer_add.*.required'=> "Gazetted Officer Address is required",
            
            'noc_ministry_inferior.required' => 'NOC from Ministry of Inferior is required',
            'memorandum_association.required' => 'Memorandum and Naiads of Association is required',
            'reg_certificate_secp.required' => 'Registration Certificate of SECP is required',
            'form_29_secp.required' => 'Latest Form 29 attested by SECP is required',
            'director_nic_copy.required' => 'Photo-copies of NIC of the Directors is required',
            'undertaking_stamp.required' => 'Undertaking on Stamp Paper is required',
            'company_address_pic.required' => 'Company Office address in Punjab is required',
            'director_photograph.required' => 'Photographs of the Directors is required',
            'director_ntn.required' => 'NTN of the Directors is required',
            
        ];
    }

    public function validationData()
    {
        $data = parent::validationData();
        return array_merge($data, [
            //'director_stay_from' => ($data['director_stay_from'] ? Carbon::createFromFormat('d/m/Y', $data['director_stay_from'])->format('Y-m-d') : Null),
            //'director_stay_to' => ($data['director_stay_to'] ? Carbon::createFromFormat('d/m/Y', $data['director_stay_to'])->format('Y-m-d') : Null),
            //'club_join_from' => ($data['club_join_from'] ? Carbon::createFromFormat('d/m/Y', $data['club_join_from'])->format('Y-m-d') : Null),
            //'club_join_to' => ($data['club_join_to'] ? Carbon::createFromFormat('d/m/Y', $data['club_join_to'])->format('Y-m-d') : Null),
        ]);
    }

}

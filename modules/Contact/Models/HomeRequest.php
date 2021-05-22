<?php
namespace Modules\Contact\Models;

use App;
use App\BaseModel;
use App\User;
use App\SpaceBudget;
use App\SpaceRequirement;
use App\SpaceBedroom;
use App\SpaceLocation;
use App\SpaceRentalTerm;
use App\SpacePreferredArea;
use App\SpaceAmenity;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeRequest extends BaseModel
{
    use SoftDeletes;
    protected $table = 'bravo_home_request_contact_form';
    protected $fillable = [
        'message',
        'status',
        'event_date',
        'event_type',
        'requirement_id',
        'preferred_area_id',
        'rental_term_id',
        'budget_id',
        'location_id',
        'bedroom_id',
        'user_id',
        'amenity_id',
        'duration_id',
    ];


    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function bedroom(){
        return $this->belongsTo(SpaceBedroom::class,'bedroom_id');
    }

    public function location(){
        return $this->belongsTo(SpaceLocation::class,'location_id');
    }
    public function budget(){
        return $this->belongsTo(User::class,'budget_id');
    }

    public function rental_term(){
        return $this->belongsTo(SpaceRentalTerm::class,'rental_term_id');
    }
    public function preferred_area(){
        return $this->belongsTo(SpacePreferredArea::class,'preferred_area_id');
    }
    public function amenity(){
        return $this->belongsTo(SpaceAmenity::class,'amenity_id');
    }
    public function requirement(){
        return $this->belongsTo(SpaceRequirement::class,'requirement_id');
    }

}

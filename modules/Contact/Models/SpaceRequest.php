<?php
namespace Modules\Contact\Models;

use App;
use App\BaseModel;
use Illuminate\Support\Str;
use Carbon\Carbon;

use App\User;
use App\SpaceBudget;
use App\SpaceRequirement;
use App\SpaceAttendee;
use App\SpaceLocation;
use App\SpaceType;
use Illuminate\Database\Eloquent\SoftDeletes;

class SpaceRequest extends BaseModel
{
    use SoftDeletes;
    protected $table = 'bravo_space_request_contact_form';
    protected $fillable = [
        'message',
        'status',
        'event_date',
        'event_type',
        'requirement_id',
        'event_type_id',
        'space_type_id',
        'budget_id',
        'location_id',
        'attendee_id',
        'user_id',
        'duration_id',
    ];


    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function attendee(){
        return $this->belongsTo(SpaceAttendee::class,'attendee_id');
    }

    public function location(){
        return $this->belongsTo(SpaceLocation::class,'location_id');
    }
    public function budget(){
        return $this->belongsTo(User::class,'budget_id');
    }

    public function space_type(){
        return $this->belongsTo(SpaceType::class,'space_type_id');
    }
    public function requirement(){
        return $this->belongsTo(SpaceRequirement::class,'requirement_id');
    }
}

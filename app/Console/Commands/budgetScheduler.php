<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Budget;
use App\Models\Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\Sendmail;

class budgetScheduler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'minutly:count_down';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Makes a count down on budget investment';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $budgets = Budget::all();

        foreach($budgets as $budget){

            switch ($budget->status) {
                case "En Attente":
                    if($budget->days == 0 && $budget->hours == 0 && $budget->minutes == 0){
                        $budget->days = 29;
                        $budget->hours = 23;
                        $budget->minutes = 59;
                        $budget->status = 3;
                        $budget->save();
            
                        $user = User::findOrFail($budget->user_id);
            
                        $notification = new Notification;
                
                        $notification->user()->associate($user); 
                        $notification->title = "Budget mis au travail";
                        $notification->content = "Votre budget est maintenant au travail pour maximum 30 jours";
                        $notification->user = $budget->user_id;
                        $notification->status = 1;
                        $notification->save();

                        $user->count_notifications = $user->count_notifications + 1;
                        $user->save();
    
                        $body = "Votre budget est maintenant au travail pour maximum 30 jours";
                        $userDetails = [
                            'title' => 'Budget mis au travail',
                            'body' => $body
                        ];
                
                        Mail::to($budget->user->email)->send(new Sendmail($userDetails)); // send mail to user
                    
                    }elseif($budget->hours == 0 && $budget->minutes == 0 && $budget->days > 0 ){
                        $budget->days = $budget->days - 1;
                        $budget->hours = 23;
                        $budget->minutes = 59;
                        $budget->save();
                    
                    }elseif($budget->minutes == 0 && $budget->hours > 0 ){
                        $budget->hours = $budget->hours - 1;
                        $budget->minutes = 59;
                        $budget->save();
                    
                    }else{
                        $budget->minutes = $budget->minutes - 1;
                        $budget->save();
                    }

                    break;
                case "Au Travail":
                    if($budget->days == 0 && $budget->hours == 0 && $budget->minutes == 0){
                        $budget->days = 0;
                        $budget->hours = 0;
                        $budget->minutes = 0;
                        $budget->status = 4;
                        $budget->save();
            
                        $user = User::findOrFail($budget->user_id);
            
                        $notification = new Notification;
                
                        $notification->user()->associate($user); 
                        $notification->title = "Budget mis en cours";
                        $notification->content = "Votre budget est maintenant en cours et pret a etre disponible";
                        $notification->user = $budget->user_id;
                        $notification->status = 1;
                        $notification->save();

                        $user->count_notifications = $user->count_notifications + 1;
                        $user->save();
            
                        $admins = User::where('is_admin', 1)->get();
                    
                        $notification = new Notification;
                
                        $notification->title = "Budget en cours";
                        $notification->content = "L'Utilisateur " . $user->name . " a un budget en cours";
                        $notification->user = $user->id;
                        $notification->status = 1;
                        
                        $adminBody = "L'Utilisateur " . $user->name . " a un budget en cours";
                        $adminDetails = [
                            'title' => 'Budget en cours',
                            'body' => $adminBody
                        ];

                        foreach($admins as $admin){
                            $admin->notifications()->save($notification);
                            Mail::to($admin->email)->send(new Sendmail($adminDetails)); // send mail to admin
                        }
    
                        $body = "Votre budget est maintenant en cours et pret a etre disponible";
                        $userDetails = [
                            'title' => 'Budget en cours',
                            'body' => $body
                        ];
    
                        Mail::to($budget->user->email)->send(new Sendmail($userDetails)); // send mail to user 
                    
                    }elseif($budget->hours == 0 && $budget->minutes == 0 && $budget->days > 0 ){
                        $budget->days = $budget->days - 1;
                        $budget->hours = 23;
                        $budget->minutes = 59;
                        $budget->save();
                    
                    }elseif($budget->minutes == 0 && $budget->hours > 0 ){
                        $budget->hours = $budget->hours - 1;
                        $budget->minutes = 59;
                        $budget->save();
                    
                    }else{
                        $budget->minutes = $budget->minutes - 1;
                        $budget->save();
                    }
                    break;
                case "Bloqué":
                    if($budget->days == 0 && $budget->hours == 0 && $budget->minutes == 0){
                        $budget->days = 0;
                        $budget->hours = 0;
                        $budget->minutes = 0;
                        $budget->status = 6;
                        $budget->save();
            
                        $user = User::findOrFail($budget->user_id);
                        $user->available = $user->available  + ($budget->amount + $budget->bloque);
                        $user->save(); 
            
                        $notification = new Notification;
                
                        $notification->user()->associate($user); 
                        $notification->title = "Budget disponible";
                        $notification->content = "Votre budget est maintenant disponible";
                        $notification->user = $budget->user_id;
                        $notification->status = 1;
                        $notification->save();

                        $user->count_notifications = $user->count_notifications + 1;
                        $user->save();
    
                        $body = "Votre budget est maintenant disponible";
                        $userDetails = [
                            'title' => 'Budget disponible',
                            'body' => $body
                        ];
                
                        Mail::to($budget->user->email)->send(new Sendmail($userDetails)); // send mail to user
                    
                    }elseif($budget->hours == 0 && $budget->minutes == 0 && $budget->days > 0 ){
                        $budget->days = $budget->days - 1;
                        $budget->hours = 23;
                        $budget->minutes = 59;
                        $budget->save();
                    
                    }elseif($budget->minutes == 0 && $budget->hours > 0 ){
                        $budget->hours = $budget->hours - 1;
                        $budget->minutes = 59;
                        $budget->save();
                    
                    }else{
                        $budget->minutes = $budget->minutes - 1;
                        $budget->save();
                    }
                    break;
            }

        }

        return 0;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Vue de tous les articles dans l'ordre.
     */
    public function index()
    {
      $events = Event::with('user')->latest()->get();

      return view('events_list.indexEvents_list', compact('events'));
    }

    /**
     * Vue pour créer un évènement.
     */
    public function create()
    {
        //cette fonction renvoie tous les events de la BDD dans la vue authentifié a ce User
        // attention que le USer ait bien créé des events sous son nom
        $eventsAll = auth()->user()->events; 

        //reprends les posts trié et les mets dans l'ordre d'update
        $events = $eventsAll->sortByDesc('updated_at');
        return view('events_list.editEvents_list', compact('events'));
    }

    /**
     * Enregistrement de l'evenement dans la base de données
     */
    public function store(StoreEventRequest $request)
    {
      if (isset($request->image)) {
        /* enregistre l'image dans le dossier storage/app/public/posts et pour qu'il ne soit pas modifiable par un utilisatur on crée un link dans public/storage/posts grâce à la commande php artisan LINK >>>>> cela crée un lien url crypté dans la base de donnée pour les retrouver ensuite <<<<<< */
        $imageLink = $request->image->store('events');
  } else {
        $imageLink = null;
  };

    Event::create([
      /* la valeur de user_id (donc l'ID de l'utilisateur authentifié) est associé par le MODEL Event en récupérant le $event->user()->associate(auth()->user()->id) dans la class Event */
      'user_id' => $request->user,
      'event_title' => $request->title,
      'event_img' => $imageLink,
      'event_place' => $request->place,
      'event_description' => $request->description,
      'event_date_start' => $request->date_start,
      'event_date_end' => $request->date_end,
      'event_price' => $request->price,
      'event_map' => $request->map,
      'event_video_link' => $request->video_link,
    ]);
    /* création da la date et heure en utilisant Carbon Laravel*/
    $dateEvent = Carbon::create(
      $truc=$request->date_start, 
      $month=$request->hour_start, 
      $day=12, 
      $hour=12, 
      $minute=12
    );

    return redirect()->route('events_list.create')->with('success','Votre article a bien été créé');
    
    }

    /**
     * Montrer un seul article.
     */
    public function show(Event $event)
    {
      return view('events_list.one-event', compact('event'));
    }

    /**
     * Montrer le formulaire de modification.
     */
    public function edit(Event $event)
    {
    /* on vérifie que l'utilisateur est bien le propriétaire de l'article */
    if (Gate::denies('MAJ-event', $event)) {
      abort(403,__("You don't have permission to perform this action !"));
  }
      return view('events_list.partials.edit-one-event', compact('event'));
    }

    /**
     * Update de l'article en cours de modification.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        //
    }

    /**
     * Suppression de l'évènement en cours.
     */
    public function destroy(Event $event)
    {
        if (Gate::denies('MAJ-event', $event)) {
          abort(403,__("You don't have permission to perform this action !"));
        }
        
        Storage::delete($event->event_img);
        $event->delete();
        return redirect()->route('events_list.create')->with('success','Votre évènement a bien été supprimé');
    }
}

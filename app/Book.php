<?php

namespace App;
use Auth;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use willvincent\Rateable\Rateable;
use Conner\Tagging\Taggable;


class Book extends Model
{

  use RecordsActivity, RecordsVisits, Sluggable, Rateable, Taggable;

  protected $indexConfigurator = MyIndexConfigurator::class;

  protected $searchRules = [
      //
  ];

      // Here you can specify a mapping for model fields
      protected $mapping = [
        'properties' => [
            'title' => [
                'type' => 'text',
                // Also you can configure multi-fields, more details you can find here https://www.elastic.co/guide/en/elasticsearch/reference/current/multi-fields.html
            ],
        ]
    ];

  protected $guarded = [];

  protected $casts = [
    'thumbnail' => 'string',
  ];

  protected $appends = ['on_shelf'];



  protected static function boot()
  {
    parent::boot();

    static::deleting(function ($book) {
      $book->reviews->each->delete();
    });
  }

  // public function author()
  // {
  //   return $this->belongsTo('App\Author');
  // }


  public function author()
  {
      return $this->belongsToMany('App\Author')->limit(1);
  }

  public function authors()
  {
      return $this->belongsToMany('App\Author');
  }

  public function translators()
  {
    return $this->belongsToMany('App\Author', 'translator_book', 'book_id', 'translator_id');
  }

  public function genres()
  {
    return $this->belongsToMany('App\Genre');
  }

  public function publisher()
  {
    return $this->belongsTo('App\Publisher');
  }
  
  public function reviews()
  {
    return $this->hasMany(Review::class);
  }

  public function fullReviews()
  {

    if(Auth::user()) {
      $query = $this->hasMany(Review::class)->whereNotNull('body')->where('body', '!=', '')->where('user_id', '!=', Auth::user()->id);
    }

    $query = $this->hasMany(Review::class)->whereNotNull('body')->where('body', '!=', '');

    switch (request('sortBy')) {
      case 'newest':
          $query->orderBy('id', 'desc');
          break;
      case 'oldest':
          $query->orderBy('id', 'asc');
          break;
          case 'best':
            $query->withCount('favorites')->orderBy('favorites_count', 'desc');
            break;
      default:
      $query->orderBy('id', 'desc');
          break;
      }

      return $query;
  }



    /**
     * Get all of the post's comments.
     */
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function scopeFilter($query, $filters)
    {
      return $filters->apply($query);
    }

    public function getReviewCountAttribute()
    {
        return $this;
    }

    public function path()
    {
      return '/book/' . $this->slug;
    }
    public function getPathAttribute()
    {
      return '/book/' . $this->slug;
    }

    public function getOnShelfAttribute()
    {
        if (Auth::guest()) {
          return false;
        }
    }

    public function getIsOnShelfAttribute()
    {
        if (Auth::guest()) {
          return false;
        }
        
    }

    public function getCoverAttribute()
    {
      if(empty($this->thumb)) {
        return 'images/books/placeholder.png';
      }

      return 'images/books/thumbnail/'.$this->thumb;
    }


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }



    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }


    public static function coreaders($book, $take = 3)
    {
        return Review::latest()->with('owner')->where([['book_id', $book], ['shelf', 'reading']])->get();
    }


}

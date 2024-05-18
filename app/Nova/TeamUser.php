<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class TeamUser extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Team>
     */
    public static $model = \App\Models\TeamUser::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'user.name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'user.name',
    ];

    public static $with = [
        'user',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make('User', 'user', User::class)
                ->searchable()
                ->showCreateRelationButton()
                ->sortable(),

            BelongsTo::make('Team', 'team', Team::class)
                ->searchable()
                ->sortable(),
            
            Text::make('Role'),
        ];
    }
}

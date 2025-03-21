<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PresaleResource\Pages;
use App\Models\Presale;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PresaleResource extends Resource
{
    protected static ?string $model = Presale::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('client_name')
                    ->required()
                    ->maxLength(255)->columnSpanFull()->extraInputAttributes([
                        'style' => 'height: 50px; padding: 10px; font-size: 16px;',
                    ]),

                Forms\Components\TextInput::make('meeting_subject')
                    ->maxLength(255)
                    ->columnSpanFull()->extraInputAttributes([
                        'style' => 'height: 50px; padding: 10px; font-size: 16px;',
                    ]), // ✅ Se extiende en toda la fila


                Forms\Components\Textarea::make('description')
                    ->columnSpanFull()->extraInputAttributes([
                        'style' => 'height: 50px; padding: 10px; font-size: 16px;',
                    ]),

                Forms\Components\Select::make('portfolio')
                    ->label('Product Line')
                    ->options([
                        'wvx_crm' => 'WVX CRM',
                        'wvx_omni' => 'WVX OMNI',
                        'wvx_conv_ia' => 'WVX CONV IA',
                        'wvx_chatbot' => 'WVX CHATBOT',
                        'wvx_voicebot' => 'WVX VOICEBOT',
                        'ippbxalo' => 'IPPBXALO',
                        'callcenter_qm' => 'CALLCENTER QM',
                        'power_bi_integration' => 'POWER BI INTEGRATION',
                        'integracion_custom' => 'INTEGRACION CUSTOM',
                    ])
                    ->multiple() // Permite seleccionar varias opciones
                    ->preload()
                    ->searchable()
                    ->columnSpanFull()
                    ->extraAttributes([
                        'style' => 'height: auto; padding: 10px; font-size: 16px;',
                    ]),

                Forms\Components\Select::make('task_type')
                    ->label('Task Type')
                    ->options([
                        'advisory' => 'Advisory',
                        'feasibility' => 'Feasibility',
                        'support' => 'Meet Presale',
                    ])
                    ->default('support') // Opción por defecto
                    ->required()
                    ->columnSpanFull()
                    ->extraAttributes([
                        'style' => 'height: 50px; padding: 10px; font-size: 16px;',
                    ]),


                Forms\Components\DateTimePicker::make('start_date')
                    ->required()->columnSpanFull()->extraInputAttributes([
                        'style' => 'height: 50px; padding: 10px; font-size: 16px;',
                    ]),



                Forms\Components\Select::make('assigned_to')
                    ->label('Engineer User')
                    ->relationship('assignedTo', 'name') // Relación con el modelo User
                    ->searchable()
                    ->preload()
                    ->required()
                    ->columnSpanFull()
                    ->extraAttributes([
                        'style' => 'height: 50px; padding: 10px; font-size: 16px;',
                    ]),

                Forms\Components\Select::make('commercial_id')
                    ->label('Commercial User')
                    ->relationship('commercial', 'name') // Relación con el modelo User
                    ->searchable()
                    ->preload()
                    ->required()
                    ->columnSpanFull()
                    ->extraAttributes([
                        'style' => 'height: 50px; padding: 10px; font-size: 16px;',
                    ]),



                Forms\Components\Select::make('priority')
                    ->label('Priority')
                    ->options([
                        'high' => 'High',
                        'medium' => 'Medium',
                        'low' => 'Low',
                    ])
                    ->default('medium') // Opción por defecto
                    ->required()
                    ->columnSpanFull()
                    ->extraAttributes([
                        'style' => 'height: 50px; padding: 10px; font-size: 16px;',
                    ]),




                Forms\Components\TagsInput::make('notification_emails')
                    ->label('Notification Emails')
                    ->placeholder('Add emails...')
                    ->separator(',') // Permite separar correos con comas
                    ->columnSpanFull()
                    ->extraAttributes([
                        'style' => 'height: auto; padding: 10px; font-size: 16px;',
                    ]),

                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'in_progress' => 'In Progress',
                        'postponed' => 'Postponed',
                        'returned_not_viable' => 'Returned - Not Viable',
                        'returned_incomplete_info' => 'Returned - Incomplete Info',
                        'completed' => 'Completed',
                        'expired' => 'Expired',
                    ])
                    ->default('pending') // Opción por defecto
                    ->required()
                    ->columnSpanFull()
                    ->extraAttributes([
                        'style' => 'height: 50px; padding: 10px; font-size: 16px;',
                    ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('client_name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('portfolio')
                    ->searchable(),


                Tables\Columns\TextColumn::make('meeting_subject')
                    ->searchable(),


                Tables\Columns\TextColumn::make('start_date')
                    ->dateTime()
                    ->sortable(),

                Tables\Columns\TextColumn::make('task_type'),

                Tables\Columns\TextColumn::make('commercial_id')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('assigned_to')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('priority'),



                Tables\Columns\TextColumn::make('status'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPresales::route('/'),
            'create' => Pages\CreatePresale::route('/create'),
            'edit' => Pages\EditPresale::route('/{record}/edit'),
        ];
    }
}

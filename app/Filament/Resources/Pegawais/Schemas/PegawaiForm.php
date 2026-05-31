<?php

namespace App\Filament\Resources\Pegawais\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class PegawaiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('nim')
                    ->required(),
                TextInput::make('nama')
                    ->required(),
                TextInput::make('gender')
                    ->required(),
                Select::make('divisi_id')
                    ->relationship('divisi', 'nama_divisi')
                    ->required(),
                Select::make('jabatan_id')
                    ->relationship('jabatan', 'nama_jabatan')
                    ->required(),
                TextInput::make('tmp_lahir')
                    ->required(),
                DatePicker::make('tgl_lahir')
                    ->required(),
                TextInput::make('hp')
                    ->required(),
                Textarea::make('alamat')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('foto')
                    ->label('Foto Pegawai')
                    ->image()->directory('pegawai')
                    ->imageEditor()->maxSize(2048)->nullable(),
            ]);
    }
}

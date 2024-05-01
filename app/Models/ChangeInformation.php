<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChangeInformation extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('avatar')
            ->singleFile();
        $this
            ->addMediaCollection('diploma')
            ->singleFile();
        $this
            ->addMediaCollection('tor')
            ->singleFile();
        $this
            ->addMediaCollection('certificate/seminar')
            ->onlyKeepLatest(10);
        $this
            ->addMediaCollection('csc_eligibility')
            ->singleFile();
        $this
            ->addMediaCollection('prc_boardrating')
            ->singleFile();
        $this
            ->addMediaCollection('medical_certificate')
            ->singleFile();
        $this
            ->addMediaCollection('nbi_clearance')
            ->singleFile();
        $this
            ->addMediaCollection('psa_birthcertificate')
            ->singleFile();
        $this
            ->addMediaCollection('psa_marriagecertificate')
            ->singleFile();
        $this
            ->addMediaCollection('service_record')
            ->onlyKeepLatest(3);
        $this
            ->addMediaCollection('approved_clearance')
            ->singleFile();
        $this
            ->addMediaCollection('other_documents')
            ->onlyKeepLatest(10);

    }
}

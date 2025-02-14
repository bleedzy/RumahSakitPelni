<?php

namespace Database\Factories\PengendalianDokumen;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PengendalianDokumen\FormDaftarDokumenEksternal>
 */
class FormDaftarDokumenEksternalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $random_division = [
            "Emergency Department",
            "Intensive Care Unit (ICU)",
            "Cardiology Department",
            "Neurology Department",
            "Pediatrics",
            "Obstetrics and Gynecology (OB/GYN)",
            "Oncology Department",
            "Radiology",
            "Anesthesiology",
            "Surgery Department",
            "Orthopedics",
            "Physical Therapy & Rehabilitation",
            "Pharmacy",
            "Laboratory Services",
            "Medical Records & Health Information",
            "Outpatient Clinic",
            "Administration & Human Resources",
            "Finance & Billing",
            "IT & Medical Informatics",
            "Housekeeping & Sanitation",
            "Security & Safety",
            "Public Relations & Patient Services",
            "Nutrition & Dietary Services",
            "Ambulance & Transport Services",
            "Research & Development",
        ];
        return [
            'no_rekaman_dokumen' => fake()->regexify("[A-Z]{3}") . '-' . fake()->regexify("[0-9]{5}"),
            'nama_divisi' => fake()->randomElement($random_division),
            'nama_document_control' => fake()->name(),
            'nama_vice_president' => 'Brian Carter',
            'signed_at' => date('Ymd'),
            'document_scan' => 'scan.jpg',
            'created_by' => User::count() ? User::inRandomOrder()->value('id') : UserFactory::new()->count(50)->create(),
            'created_at' => now(),
            'updated_at' => null
        ];
    }
}

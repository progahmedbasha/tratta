<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\BasicDataController;
use App\Http\Controllers\Dashboard\AgeController;
use App\Http\Controllers\Dashboard\GenderController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\IllnessCategoryController;
use App\Http\Controllers\Dashboard\IndicationController;
use App\Http\Controllers\Dashboard\WeightController;
use App\Http\Controllers\Dashboard\WeightGenderController;
use App\Http\Controllers\Dashboard\PregnancyStageController;
use App\Http\Controllers\Dashboard\PregnancySafetyController;
use App\Http\Controllers\Dashboard\NursingSafetyCategoryController;
use App\Http\Controllers\Dashboard\FormulaController;
use App\Http\Controllers\Dashboard\EffectController;
use App\Http\Controllers\Dashboard\CrclRangeController;
use App\Http\Controllers\Dashboard\ScrController;
use App\Http\Controllers\Dashboard\DrugController;
use App\Http\Controllers\Dashboard\DrugFormulaController;
use App\Http\Controllers\Dashboard\DrugIndicationController;
use App\Http\Controllers\Dashboard\InteractionSeverityController;
use App\Http\Controllers\Dashboard\VariableController;
use App\Http\Controllers\Dashboard\FixedDoseController;
use App\Http\Controllers\Dashboard\VariableDetailController;
use App\Http\Controllers\Dashboard\IllnessSubController;
use App\Http\Controllers\Dashboard\KidneyController;
use App\Http\Controllers\Dashboard\DoseOrController;
use App\Http\Controllers\Dashboard\DoseAndController;
use App\Http\Controllers\Dashboard\NotesOrController;
use App\Http\Controllers\Dashboard\NotesAndController;
use App\Http\Controllers\Dashboard\NoteDoseController;
use App\Http\Controllers\Dashboard\DrugPregnancyController;
use App\Http\Controllers\Dashboard\DrugTradeController;
use App\Http\Controllers\Dashboard\DrugMoaController;
use App\Http\Controllers\Dashboard\HxDrugController;
use App\Http\Controllers\Dashboard\ForbiddenCaseController;
use App\Http\Controllers\Dashboard\PredoseController;
use App\Http\Controllers\Dashboard\PredoseFirstQuestionController;
use App\Http\Controllers\Dashboard\PredoseSecondQuestionController;
use App\Http\Controllers\Dashboard\PredoseThirdQuestionController;
use App\Http\Controllers\Dashboard\PredoseFourthQuestionController;
use App\Http\Controllers\Dashboard\TradeKeyController;
use App\Http\Controllers\Web\SearchController;
use App\Http\Controllers\Web\AlgorithmController;
use App\Http\Controllers\Web\ConditionAlgorithmController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'customer',],function () {
    Route::get('/home',[SearchController::class,'index']);

    Route::post('search',[SearchController::class,'search'])->name('search');
    Route::post('search-drugs',[SearchController::class,'searchDrugs'])->name('search_drugs');
    Route::post('search-indications',[SearchController::class,'drugIndications'])->name('search_indications');
    Route::post('illness-search',[SearchController::class,'searchIllness'])->name('illness-search');
    Route::post('drugs-search',[SearchController::class,'searchDrugDrugs'])->name('drugs-search');
    Route::post('pregnancy-stage',[SearchController::class,'pregnancyStage'])->name('pregnancy-stage');
    Route::post('dose-note-result',[AlgorithmController::class,'dose_note_result'])->name('dose-note-result');
    Route::post('drug-pregnancy-result',[AlgorithmController::class,'drugPregnancy'])->name('drug-pregnancy-result');
    Route::post('calculator',[ConditionAlgorithmController::class,'calculator'])->name('calculator');
    Route::post('recheck-drugs',[ConditionAlgorithmController::class,'recheckDrugs'])->name('recheck-drugs');
    Route::post('kidneys',[ConditionAlgorithmController::class,'kidneys'])->name('kidneys');
    Route::post('preDoseQ',[ConditionAlgorithmController::class,'preDoseQ'])->name('preDoseQ');
    Route::post('question2-result',[ConditionAlgorithmController::class,'question2Result'])->name('question2-result');
    Route::post('question4-data',[ConditionAlgorithmController::class,'question4Data'])->name('question4-data');
    Route::post('question4-result',[ConditionAlgorithmController::class,'question4result'])->name('question4-result');
    Route::post('forbidden-cases',[ConditionAlgorithmController::class,'forbiddenCases'])->name('forbidden-cases');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
/********************** Only Auth *************************/

    /********************** Only admin *************************/
    Route::group([
        'prefix' => 'admin',
        'middleware' => ['admin','auth']
    ],function () {
        
        Route::get('dashboard', function () {
            return view('dashboard.dashboard');
        })->name('dashboard');
    Route::get('basic_data', [BasicDataController::class, 'index'])->name('basic_data');
    Route::resource('categories', CategoryController::class);
    Route::post('category_activation', [CategoryController::class, 'status'])->name('category_activation');
    Route::resource('illness_categories', IllnessCategoryController::class);
    Route::post('illness_category_activation', [IllnessCategoryController::class, 'status'])->name('illness_category_activation');
    Route::resource('illness_subs', IllnessSubController::class);
    Route::resource('indications', IndicationController::class);
    Route::resource('ages', AgeController::class);
    Route::resource('genders', GenderController::class);
    Route::resource('weights', WeightController::class);
    Route::resource('pregnancy_stages', PregnancyStageController::class);
    Route::resource('pregnancy_safties', PregnancySafetyController::class);
    Route::resource('nursing_safety_categories', NursingSafetyCategoryController::class);
    Route::resource('formulas', FormulaController::class);
    Route::resource('effects', EffectController::class);
    Route::resource('scrs', ScrController::class);
    Route::resource('weight_genders', WeightGenderController::class);
    Route::resource('crcl_ranges', CrclRangeController::class);
    Route::resource('interaction_severities', InteractionSeverityController::class);
    Route::resource('kidneys', KidneyController::class);
    /********************** Drugs Not complete *************************/
    Route::resource('drugs', DrugController::class);
    /********************** drug_formulas Not complete *************************/
    Route::resource('drug_formulas', DrugFormulaController::class);
    /********************** drug_indications Not complete *************************/
    Route::resource('drug_indications', DrugIndicationController::class);
    
    /********************** variables *************************/
    Route::resource('variables', VariableController::class);
    /*Route::get('variable_details_create/{id}', [VariableController::class, 'create'])->name('variable_details_create');
    Route::get('variable_details_show/{variable}/{drug}', [VariableController::class, 'show'])->name('variable_details_show');*/
    Route::post('age_variable', [VariableController::class, 'ageVariable'])->name('age_variable');
    Route::post('weight_variable', [VariableController::class, 'weightVariable'])->name('weight_variable');
    Route::post('gender_variable', [VariableController::class, 'genderVariable'])->name('gender_variable');
    Route::post('pregnancy_stage_variable', [VariableController::class, 'pregnancy_stageVariable'])->name('pregnancy_stage_variable');
    Route::post('illness_data_variable', [VariableController::class, 'illness_dataVariable'])->name('illness_data_variable');
    Route::post('drug_variable', [VariableController::class, 'drugVariable'])->name('drug_variable');
        /********************** variable details *************************/
    Route::resource('variable_details', VariableDetailController::class);
    
    /********************** fixed doses *************************/
    Route::resource('fixed_doses', FixedDoseController::class);
    Route::get('fixed_doses_create/{id}', [FixedDoseController::class, 'create'])->name('fixed_doses_create');
    /********************** dose base *************************/
    Route::resource('dose_or', DoseOrController::class);
    /********************** dose or & dose and *************************/
    Route::get('dose_or_create/{id}', [DoseOrController::class, 'create'])->name('dose_or_create');
    Route::get('dose_and_create/{id}', [DoseAndController::class, 'create'])->name('dose_and_create');
    /********************** notes or & notes and *************************/
    Route::resource('notes', NotesOrController::class);
    Route::get('notes_or_create/{id}', [NotesOrController::class, 'create'])->name('notes_or_create');
    Route::get('notes_and_create/{id}', [NotesAndController::class, 'create'])->name('notes_and_create');
    /********************** fetch variables *************************/
    Route::resource('note_doses', NoteDoseController::class);
    Route::post('variable_dose_delete/{id}', [NoteDoseController::class, 'varDelete'])->name('variable_dose_delete');
    Route::post('fetch_variables', [NoteDoseController::class, 'fetch'])->name('fetch_variables');
    Route::post('add_row', [NoteDoseController::class, 'add_row'])->name('add_row');
    
    /********************** variable pregnancy *************************/
    Route::resource('drug_pregnancy', DrugPregnancyController::class);
    /********************** Treadename *************************/
    Route::resource('trades', DrugTradeController::class);
    /********************** drug MOA *************************/
    Route::resource('moa_drugs', DrugMoaController::class);
    /********************** hx drugs *************************/
    Route::resource('hx_drugs', HxDrugController::class);
    /********************** hx drugs *************************/
    Route::resource('forbidden_cases', ForbiddenCaseController::class);
    Route::post('forbidden_fetch_variables', [ForbiddenCaseController::class, 'fetch'])->name('forbidden_fetch_variables');
    Route::post('forbidden_add_row', [ForbiddenCaseController::class, 'add_row'])->name('forbidden_add_row');
    
    Route::post('add_row_value2', [ForbiddenCaseController::class, 'add_row_value2'])->name('add_row_value2');
    /********************** Predose Q *************************/
    Route::resource('predoses', PredoseController::class);
    Route::post('predose_fetch_variables', [PredoseController::class, 'fetch'])->name('predose_fetch_variables');
    Route::post('predose_variable_delete/{id}', [PredoseController::class, 'delete_variable'])->name('predose_variable_delete');
    Route::resource('first_questions', PredoseFirstQuestionController::class);
    Route::get('first_question/{id}', [PredoseFirstQuestionController::class, 'create'])->name('first_question');
    Route::resource('second_questions', PredoseSecondQuestionController::class);
    Route::get('second_question/{id}', [PredoseSecondQuestionController::class, 'create'])->name('second_question');
    Route::post('second_question_add_row', [PredoseSecondQuestionController::class, 'add_row'])->name('second_question_add_row');
    Route::post('second_question_range_update/{id}', [PredoseSecondQuestionController::class, 'second_question_range_update'])->name('second_question_range_update');
    Route::post('second_question_range_delete/{id}', [PredoseSecondQuestionController::class, 'second_question_range_delete'])->name('second_question_range_delete');

    Route::resource('third_questions', PredoseThirdQuestionController::class);
    Route::get('third_question/{id}', [PredoseThirdQuestionController::class, 'create'])->name('third_question');
    
    Route::resource('fourth_questions', PredoseFourthQuestionController::class);
    Route::get('fourth_question/{id}', [PredoseFourthQuestionController::class, 'create'])->name('fourth_question');
    Route::post('save_q4_score', [PredoseFourthQuestionController::class, 'save_q4_score'])->name('save_q4_score');
    Route::post('delete_score/{id}', [PredoseFourthQuestionController::class, 'delete_score'])->name('delete_score');
        /********************** trade_keys *************************/
    Route::resource('trade_keys', TradeKeyController::class);
    });
    
    /********************** test *************************/
    Route::resource('tests', App\Http\Controllers\test\TestController::class);
    Route::post('drug_fetch_indication', [App\Http\Controllers\test\TestController::class, 'fetch'])->name('drug_fetch_indication');


require __DIR__.'/auth.php';
<?php

use App\Auction;

Route::get('/', 'AuctionsController@index')->name('home');
Route::post('/auctions', 'AuctionsController@store');
Route::post('/auctions/finish', 'AuctionsController@finish');
Route::get('/auctions/modify/{token}', 'AuctionsController@modify');
Route::put('/auctions/modify/{auction}', 'AuctionsController@update');
Route::get('/auctions/buyer/{token}', 'AuctionsController@showAllBuyer');
Route::get('/auctions/buyer/', 'AuctionsController@showAllBuyer');
Route::get('/auctions/finish/determineAuctionUser', 'AuctionsController@determineAuctionUser');

Route::get('/auctions/show/{token}', 'AuctionsController@show');
Route::post('/auctions/start/', 'AuctionsController@startAuction');
Route::post('/auctions/{auction}/offers', 'OffersController@store');
Route::get('/auctions/confirmAuction/{token}', 'AuctionsController@confirmAuction');
#Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/edit', 'UserController@edit')->name('edit');

//Angebote abgeben
Route::get('/offers/new/{token}', 'OffersController@new');

//Einzelnes Angebot des Händlers anzeigen
Route::get('/offers/show/{token}', 'OffersController@show');

//Einzelnes Angebot des Händlers bearbeiten
Route::get('/offers/edit/{token}', 'OffersController@edit');

//Angebote des Händlers anzeigen
Route::get('/offers/showAll/', 'OffersController@showAll');

//Anfragen für den Händler anzeigen
Route::get('/auctions/trader/{token}', 'AuctionsController@showAllTrader');

//Show all traders of the user
Route::get('/users/trader/', 'TradersController@index')->name('showTrader');

//Create trader
Route::post('/users/trader/', 'TradersController@store')->name('newTrader');

//Edit trader from link
Route::get('/users/trader/{trader}', 'TradersController@edit')->name('editTrader');

//Update trader from link
Route::put('/users/trader/{trader}', 'TradersController@update')->name('updateTrader');

//Delete trader from link
Route::delete('/users/trader/{trader}', 'TradersController@destroy')->name('destroyTrader');

Route::put('/users/update', 'UserController@update');
Auth::routes();

Route::get('/login/{social}', 'Auth\LoginController@socialLogin')->where('social', 'twitter|facebook|linkedin|google|github|bitbucket');

Route::get('/login/{social}/callback', 'Auth\LoginController@handleProviderCallback')->where('social', 'twitter|facebook|linkedin|google|github|bitbucket');

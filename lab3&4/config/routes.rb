Rails.application.routes.draw do
  resources :roles
  devise_for :admins
    scope "/admin" do 
      resources :admins
    end
  # Define your application routes per the DSL in https://guides.rubyonrails.org/routing.html

  # Defines the root path route ("/")
  root "books#index"
  resources :books 
end

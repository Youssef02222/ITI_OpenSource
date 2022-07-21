class AdminMailer < ApplicationMailer


    default from: "youssef.ibrahem.2022@gmail.com"

    def welcome_email
        @user = params[:user]
        p @user
        @url = 'http://localhost:3000/login'
        mail(to: @user.email, subject: "Welcome from youssef.ibrahem.2022@gmail.com")
    end

end

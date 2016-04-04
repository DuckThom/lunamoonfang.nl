class SessionsController < ApplicationController
  def new
    @account = Account.new
  end

  def create
    input = params[:account]
    user = Account.find_by(username: input['username'])

    if !user.nil?
      if user.authenticate(input['password'])
        log_in user
        redirect_to '/account' and return
      end
    end

    flash[:error] = 'Invalid username/password'
    redirect_to '/login'
  end

  def destroy
    log_out if logged_in?
    redirect_to root_url
  end
end

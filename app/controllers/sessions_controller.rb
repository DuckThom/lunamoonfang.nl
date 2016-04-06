class SessionsController < ApplicationController
  def new
    redirect_to '/' unless not logged_in?

    @account = Account.new
  end

  def create
    redirect_to '/' unless not logged_in?

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
    redirect_to '/' unless logged_in?

    log_out
    redirect_to root_url
  end
end

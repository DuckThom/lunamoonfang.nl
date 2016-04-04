class AccountController < ApplicationController
  def index
    redirect_to :back unless logged_in?
  end
end

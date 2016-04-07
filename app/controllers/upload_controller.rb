class UploadController < ApplicationController
  include UploadHelper

  skip_before_action :verify_authenticity_token, only: [:screenshot]

  def image
    redirect_to '/login' and return unless logged_in?

    # Find an unused hash
    hash = generate_hash
    while not Image.find_by_url_hash(hash).nil? do
      hash = generate_hash
    end

    Image.save_file(params[:upload], hash)

    redirect_to '/image/' + hash
  end

  def screenshot
    redirect_to '/' and return unless params[:key] == ENV['SECRET_UPLOAD_KEY']

    # Find an unused hash
    hash = generate_hash
    while not Image.find_by_url_hash(hash).nil? do
      hash = generate_hash
    end

    #Image.save_file(params[:upload], hash)

    render json: '/image/' + hash
  end
end

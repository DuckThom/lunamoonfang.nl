class UploadController < ApplicationController
  include UploadHelper

  def image
    redirect_to '/login' unless logged_in?

    # Find an unused hash
    hash = generate_hash
    while not Image.find_by_url_hash(hash).nil? do
      hash = generate_hash
    end

    Image.save_file(params[:upload], hash)

    redirect_to '/image/' + hash
  end
end
